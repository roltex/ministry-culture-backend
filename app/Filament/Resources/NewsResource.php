<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;
use App\Utils\GeorgianTransliterator;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'სიახლეები';
    protected static ?string $modelLabel = 'სიახლე';
    protected static ?string $pluralModelLabel = 'სიახლეები';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('სიახლის კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.ka')
                                    ->label('კონტენტი (ქართული)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('excerpt.ka')
                                    ->label('მოკლე აღწერა (ქართული)')
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('სათაური (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.en')
                                    ->label('კონტენტი (ინგლისური)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('excerpt.en')
                                    ->label('მოკლე აღწერა (ინგლისური)')
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('პარამეტრები')
                    ->schema([
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
                            })
                            ->helperText('სათაურის URL-ში გამოსაყენებელი ვერსია'),
                        
                        FileUpload::make('featured_image')
                            ->label('მთავარი ფოტო')
                            ->image()

                            ->directory('news-images')
                            
                            ->maxSize(2048)
                            ->helperText('რეკომენდებული ზომა: 1200x630px'),
                        
                        FileUpload::make('gallery')
                            ->label('გალერეა')
                            ->image()

                            ->directory('news-images')
                            
                            ->multiple()
                            ->maxFiles(10)
                            ->maxSize(2048)
                            ->reorderable()
                            ->helperText('შეგიძლიათ ატვირთოთ მაქსიმუმ 10 ფოტო გალერეისთვის'),
                        
                        FileUpload::make('attachments')
                            ->label('დანართები')

                            ->directory('news-attachments')
                            
                            ->multiple()
                            ->maxFiles(5)
                            ->maxSize(10240)
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                            ->helperText('შეგიძლიათ ატვირთოთ მაქსიმუმ 5 ფაილი (PDF, Word, Excel - თითოეული მაქს. 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        DateTimePicker::make('published_at')
                            ->label('გამოქვეყნების თარიღი')
                            ->default(now())
                            ->helperText('როდის უნდა გამოქვეყნდეს ეს სიახლე'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('ფოტო')
                    ->circular()
                    ->size(40),
                TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->limit(40)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                ToggleColumn::make('is_published')
                    ->label('გამოქვეყნებული'),
                TextColumn::make('published_at')
                    ->label('გამოქვეყნების თარიღი')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('გამოქვეყნებული')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('დრაფტი')
                    ->label('დრაფტი')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', false)),
                Filter::make('დღეს გამოქვეყნებული')
                    ->label('დღეს გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->whereDate('published_at', today())),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('ნახვა'),
                Tables\Actions\EditAction::make()->label('რედაქტირება'),
                Tables\Actions\DeleteAction::make()->label('წაშლა'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('წაშლა'),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
