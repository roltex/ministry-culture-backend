<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionResource\Pages;
use App\Filament\Resources\CompetitionResource\RelationManagers;
use App\Models\Competition;
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
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;
use App\Utils\GeorgianTransliterator;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'კონკურსები';
    protected static ?string $modelLabel = 'კონკურსი';
    protected static ?string $pluralModelLabel = 'კონკურსები';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('კონკურსის კონტენტი')
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
                                Textarea::make('description.ka')
                                    ->label('აღწერა (ქართული)')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(500),
                                Textarea::make('excerpt.ka')
                                    ->label('მოკლე აღწერა (ქართული)')
                                    ->rows(2)
                                    ->maxLength(255),
                                Textarea::make('requirements.ka')
                                    ->label('მოთხოვნები (ქართული)')
                                    ->rows(4)
                                    ->columnSpanFull(),
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
                                Textarea::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(500),
                                Textarea::make('excerpt.en')
                                    ->label('მოკლე აღწერა (ინგლისური)')
                                    ->rows(2)
                                    ->maxLength(255),
                                Textarea::make('requirements.en')
                                    ->label('მოთხოვნები (ინგლისური)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('კონკურსის დეტალები')
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
                        
                        Select::make('category')
                            ->options([
                                'arts' => 'ხელოვნება',
                                'music' => 'მუსიკა',
                                'dance' => 'ცეკვა',
                                'theater' => 'თეატრი',
                                'literature' => 'ლიტერატურა',
                                'film' => 'კინო',
                                'sports' => 'სპორტი',
                                'other' => 'სხვა',
                            ])
                            ->label('კატეგორია')
                            ->required()
                            ->searchable(),
                        
                        TextInput::make('prize_amount')
                            ->label('პრიზის თანხა')
                            ->numeric()
                            ->prefix('₾')
                            ->helperText('სულ პრიზის თანხა ლარში'),
                        
                        TextInput::make('max_participants')
                            ->label('მაქს. მონაწილეები')
                            ->numeric()
                            ->helperText('მაქსიმალური მონაწილეთა რაოდენობა'),
                        
                        TextInput::make('contact_email')
                            ->label('საკონტაქტო ელ-ფოსტა')
                            ->email()
                            ->required(),
                        
                        TextInput::make('contact_phone')
                            ->label('საკონტაქტო ტელეფონი')
                            ->tel(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('ვადები')
                    ->schema([
                        DateTimePicker::make('registration_deadline')
                            ->label('რეგისტრაციის ვადა')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('competition_start')
                            ->label('კონკურსის დაწყების თარიღი')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('competition_end')
                            ->label('კონკურსის დასრულების თარიღი')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('results_announcement')
                            ->label('შედეგების გამოცხადების თარიღი')
                            ->default(now()),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('მედია და პარამეტრები')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('ფოტო')
                            ->image()
                            ->directory('competition-images')
                            ->maxSize(2048)
                            ->helperText('რეკომენდებული ზომა: 1200x630px'),
                        
                        FileUpload::make('application_form')
                            ->label('განაცხადის ფორმა')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('competition-forms')
                            ->maxSize(10240)
                            ->helperText('PDF ფაილი (მაქს 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        Toggle::make('is_active')
                            ->label('აქტიური')
                            ->default(true)
                            ->helperText('მიმდინარეობს განაცხადების მიღება?'),
                        
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
                ImageColumn::make('featured_image')
                    ->label('ფოტო')
                    ->circular()
                    ->size(40),
                TextColumn::make('title')
                    ->label('სათაური (ქართული)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('title')
                    ->label('სათაური (ინგლისური)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'en'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->en', 'like', "%{$search}%");
                    }),
                TextColumn::make('category')
                    ->label('კატეგორია')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'arts' => 'ხელოვნება',
                        'music' => 'მუსიკა',
                        'dance' => 'ცეკვა',
                        'theater' => 'თეატრი',
                        'literature' => 'ლიტერატურა',
                        'film' => 'კინო',
                        'sports' => 'სპორტი',
                        'other' => 'სხვა',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('prize_amount')
                    ->label('პრიზი')
                    ->money('GEL')
                    ->sortable(),
                TextColumn::make('registration_deadline')
                    ->label('რეგისტრაციის ვადა')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('competition_start')
                    ->label('დაწყების თარიღი')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('application_form')
                    ->label('განაცხადის ფორმა')
                    ->url(fn ($record) => $record->application_form ? Storage::url($record->application_form) : null)
                    ->openUrlInNewTab()
                    ->toggleable(),
                ToggleColumn::make('is_published')
                    ->label('გამოქვეყნებული'),
                ToggleColumn::make('is_active')
                    ->label('აქტიური'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'arts' => 'ხელოვნება',
                        'music' => 'მუსიკა',
                        'dance' => 'ცეკვა',
                        'theater' => 'თეატრი',
                        'literature' => 'ლიტერატურა',
                        'film' => 'კინო',
                        'sports' => 'სპორტი',
                        'other' => 'სხვა',
                    ])
                    ->label('კატეგორია'),
                Filter::make('published')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('active')
                    ->label('აქტიური')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('registration_open')
                    ->label('რეგისტრაცია ღიაა')
                    ->query(fn (Builder $query): Builder => $query->where('registration_deadline', '>', now())),
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
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}
