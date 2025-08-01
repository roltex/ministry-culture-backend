<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegislationResource\Pages;
use App\Filament\Resources\LegislationResource\RelationManagers;
use App\Models\Legislation;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;
use App\Utils\GeorgianTransliterator;

class LegislationResource extends Resource
{
    protected static ?string $model = Legislation::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'კანონმდებლობა';
    protected static ?string $modelLabel = 'კანონმდებლობა';
    protected static ?string $pluralModelLabel = 'კანონმდებლობა';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('კანონმდებლობის კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.ka')
                                    ->label('აღწერა (ქართული)')
                                    ->required()
                                    ->columnSpanFull(),
                                RichEditor::make('content.ka')
                                    ->label('კონტენტი (ქართული)')
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('სათაური (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->required()
                                    ->columnSpanFull(),
                                RichEditor::make('content.en')
                                    ->label('კონტენტი (ინგლისური)')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('დოკუმენტის დეტალები')
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
                        
                        TextInput::make('act_number')
                            ->label('აქტის ნომერი')
                            ->required()
                            ->maxLength(255)
                            ->helperText('ოფიციალური დოკუმენტის ნომერი ან მითითება'),
                        
                        TextInput::make('document_type.ka')
                            ->label('დოკუმენტის ტიპი (ქართული)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('document_type.en')
                            ->label('დოკუმენტის ტიპი (ინგლისური)')
                            ->required()
                            ->maxLength(255),
                        
                        DatePicker::make('adoption_date')
                            ->label('მიღების თარიღი')
                            ->required(),
                        
                        DatePicker::make('effective_date')
                            ->label('ძალის შესვლის თარიღი')
                            ->required(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('ფაილები და პარამეტრები')
                    ->schema([
                        FileUpload::make('document_file')
                            ->label('დოკუმენტის ფაილი')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->required()
                            ->helperText('PDF დოკუმენტი (მაქს 10MB)'),
                        
                        FileUpload::make('document_file_ka')
                            ->label('დოკუმენტის ფაილი (ქართული)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->helperText('PDF დოკუმენტი ქართულად (მაქს 10MB)'),
                        
                        FileUpload::make('document_file_en')
                            ->label('დოკუმენტის ფაილი (ინგლისური)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->helperText('PDF დოკუმენტი ინგლისურად (მაქს 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        DateTimePicker::make('published_at')
                            ->label('გამოქვეყნების თარიღი')
                            ->default(now()),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('act_number')
                    ->label('აქტის ნომერი')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('document_type')
                    ->label('დოკუმენტის ტიპი')
                    ->badge()
                    ->formatStateUsing(fn ($record) => $record->getTranslation('document_type', 'ka'))
                    ->searchable(),
                TextColumn::make('adoption_date')
                    ->label('მიღების თარიღი')
                    ->date()
                    ->sortable(),
                TextColumn::make('effective_date')
                    ->label('ძალის შესვლის თარიღი')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('გამოქვეყნებული'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('document_type')
                    ->options([
                        'Law' => 'კანონი',
                        'Decree' => 'დეკრეტი',
                        'Regulation' => 'რეგულაცია',
                        'Order' => 'ბრძანება',
                        'Resolution' => 'რეზოლუცია',
                        'Guideline' => 'გაიდლაინი',
                        'Policy' => 'პოლიტიკა',
                        'Other' => 'სხვა',
                    ])
                    ->label('დოკუმენტის ტიპი'),
                Filter::make('published')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
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
            ->defaultSort('effective_date', 'desc');
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
            'index' => Pages\ListLegislations::route('/'),
            'create' => Pages\CreateLegislation::route('/create'),
            'edit' => Pages\EditLegislation::route('/{record}/edit'),
        ];
    }
}
