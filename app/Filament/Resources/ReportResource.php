<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use App\Utils\GeorgianTransliterator;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Georgian labels for the admin panel
    protected static ?string $navigationLabel = 'ანგარიშები';
    protected static ?string $modelLabel = 'ანგარიში';
    protected static ?string $pluralModelLabel = 'ანგარიშები';
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('ანგარიშის კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description.ka')
                                    ->label('აღწერა (ქართული)')
                                    ->rows(4),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('სათაური (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->rows(4),
                            ]),
                    ])
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->label('URL-ის ნაწილი')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function ($state, $set, $get) {
                        $georgianTitle = $get('title.ka');
                        if (!empty($georgianTitle) && empty($state)) {
                            $slug = GeorgianTransliterator::generateSlug($georgianTitle);
                            $set('slug', $slug);
                        }
                    }),
                FileUpload::make('attachments')
                    ->label('დანართები')
                    ->disk('public')
                    ->directory('report-attachments')
                    ->multiple()
                    ->maxFiles(10)
                    ->maxSize(10240)
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                    ->helperText('შეგიძლიათ ატვირთოთ მაქსიმუმ 10 ფაილი (PDF, Word, Excel - თითოეული მაქს. 10MB)'),
                Toggle::make('is_published')
                    ->label('გამოქვეყნებული')
                    ->default(true),
                DateTimePicker::make('published_at')
                    ->label('გამოქვეყნების თარიღი')
                    ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('გამოქვეყნებული')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('გამოქვეყნების თარიღი')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('განახლების თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('რედაქტირება'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('წაშლა'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
