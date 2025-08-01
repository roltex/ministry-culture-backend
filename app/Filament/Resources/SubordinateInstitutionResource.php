<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubordinateInstitutionResource\Pages;
use App\Filament\Resources\SubordinateInstitutionResource\RelationManagers;
use App\Models\SubordinateInstitution;
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
use Filament\Forms\Components\Textarea as FormsTextarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use App\Utils\GeorgianTransliterator;

class SubordinateInstitutionResource extends Resource
{
    protected static ?string $model = SubordinateInstitution::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'სსიპები';
    protected static ?string $modelLabel = 'სსიპი';
    protected static ?string $pluralModelLabel = 'სსიპები';
    
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('დაწესებულების კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('name.ka')
                                    ->label('დასახელება (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.ka')
                                    ->label('აღწერა (ქართული)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('mission.ka')
                                    ->label('მისია (ქართული)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Textarea::make('vision.ka')
                                    ->label('ხედვა (ქართული)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('დასახელება (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('mission.en')
                                    ->label('მისია (ინგლისური)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Textarea::make('vision.en')
                                    ->label('ხედვა (ინგლისური)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('დაწესებულების დეტალები')
                    ->schema([
                        TextInput::make('slug')
                            ->label('URL-ის ნაწილი')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->live()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $georgianName = $get('name.ka');
                                if (!empty($georgianName) && empty($state)) {
                                    $slug = GeorgianTransliterator::generateSlug($georgianName);
                                    $set('slug', $slug);
                                }
                            })
                            ->helperText('სათაურის URL-ში გამოსაყენებელი ვერსია'),
                        
                        Select::make('type')
                            ->options([
                                'museum' => 'მუზეუმი',
                                'theater' => 'თეატრი',
                                'library' => 'ბიბლიოთეკა',
                                'archive' => 'არქივი',
                                'cultural_center' => 'კულტურის ცენტრი',
                                'sports_center' => 'სპორტული ცენტრი',
                                'academy' => 'აკადემია',
                                'institute' => 'ინსტიტუტი',
                                'agency' => 'სააგენტო',
                                'foundation' => 'ფონდი',
                                'other' => 'სხვა',
                            ])
                            ->label('ტიპი')
                            ->required()
                            ->searchable(),
                        
                        Select::make('status')
                            ->options([
                                'active' => 'აქტიური',
                                'inactive' => 'არააქტიური',
                                'under_construction' => 'მშენებლობის პროცესში',
                                'temporarily_closed' => 'დროებით დახურული',
                                'permanently_closed' => 'მუდმივად დახურული',
                            ])
                            ->label('სტატუსი')
                            ->required()
                            ->default('active'),
                        
                        TextInput::make('director_name')
                            ->label('დირექტორის სახელი')
                            ->maxLength(255),
                        
                        TextInput::make('establishment_year')
                            ->label('დაარსების წელი')
                            ->numeric()
                            ->minValue(1800)
                            ->maxValue(date('Y'))
                            ->helperText('დაწესებულების დაარსების წელი'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('საკონტაქტო ინფორმაცია')
                    ->schema([
                        TextInput::make('address')
                            ->label('მისამართი')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        
                        TextInput::make('phone')
                            ->label('ტელეფონი')
                            ->tel(),
                        
                        TextInput::make('email')
                            ->label('ელ-ფოსტა')
                            ->email(),
                        
                        TextInput::make('website_url')
                            ->label('ვებგვერდი')
                            ->url()
                            ->helperText('სრული URL მისამართი https:// ჩათვლით'),
                        
                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url()
                            ->prefix('https://facebook.com/'),
                        
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url()
                            ->prefix('https://instagram.com/'),
                        
                        TextInput::make('twitter')
                            ->label('Twitter')
                            ->url()
                            ->prefix('https://twitter.com/'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('მედია და პარამეტრები')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('ლოგო')
                            ->image()
                            ->directory('institution-logos')
                            ->maxSize(1024)
                            ->helperText('ლოგო (მაქს 1MB)'),
                        
                        FileUpload::make('image')
                            ->label('სურათი')
                            ->image()
                            ->directory('institution-images')
                            ->maxSize(2048)
                            ->helperText('სურათი (მაქს 2MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        Toggle::make('is_featured')
                            ->label('რჩეული')
                            ->default(false)
                            ->helperText('გამოაჩინე დაწესებულება გამორჩეულად'),
                        
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
                ImageColumn::make('logo')
                    ->label('ლოგო')
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->label('დასახელება (ქართული)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('name->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('name')
                    ->label('დასახელება (ინგლისური)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'en'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('name->en', 'like', "%{$search}%");
                    }),
                TextColumn::make('type')
                    ->label('ტიპი')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'museum' => 'მუზეუმი',
                        'theater' => 'თეატრი',
                        'library' => 'ბიბლიოთეკა',
                        'archive' => 'არქივი',
                        'cultural_center' => 'კულტურის ცენტრი',
                        'sports_center' => 'სპორტული ცენტრი',
                        'academy' => 'აკადემია',
                        'institute' => 'ინსტიტუტი',
                        'agency' => 'სააგენტო',
                        'foundation' => 'ფონდი',
                        'other' => 'სხვა',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('status')
                    ->label('სტატუსი')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'green',
                        'inactive' => 'gray',
                        'under_construction' => 'yellow',
                        'temporarily_closed' => 'orange',
                        'permanently_closed' => 'red',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'active' => 'აქტიური',
                        'inactive' => 'არააქტიური',
                        'under_construction' => 'მშენებლობის პროცესში',
                        'temporarily_closed' => 'დროებით დახურული',
                        'permanently_closed' => 'მუდმივად დახურული',
                        default => $state,
                    }),
                TextColumn::make('director_name')
                    ->label('დირექტორი')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('establishment_year')
                    ->label('დაარსების წელი')
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('ტელეფონი')
                    ->searchable(),
                ToggleColumn::make('is_published')
                    ->label('გამოქვეყნებული'),
                ToggleColumn::make('is_featured')
                    ->label('რჩეული'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'museum' => 'მუზეუმი',
                        'theater' => 'თეატრი',
                        'library' => 'ბიბლიოთეკა',
                        'archive' => 'არქივი',
                        'cultural_center' => 'კულტურის ცენტრი',
                        'sports_center' => 'სპორტული ცენტრი',
                        'academy' => 'აკადემია',
                        'institute' => 'ინსტიტუტი',
                        'agency' => 'სააგენტო',
                        'foundation' => 'ფონდი',
                        'other' => 'სხვა',
                    ])
                    ->label('ტიპი'),
                SelectFilter::make('status')
                    ->options([
                        'active' => 'აქტიური',
                        'inactive' => 'არააქტიური',
                        'under_construction' => 'მშენებლობის პროცესში',
                        'temporarily_closed' => 'დროებით დახურული',
                        'permanently_closed' => 'მუდმივად დახურული',
                    ])
                    ->label('სტატუსი'),
                Filter::make('published')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('featured')
                    ->label('რჩეული')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
                Filter::make('active_status')
                    ->label('აქტიური')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'active')),
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
            'index' => Pages\ListSubordinateInstitutions::route('/'),
            'create' => Pages\CreateSubordinateInstitution::route('/create'),
            'edit' => Pages\EditSubordinateInstitution::route('/{record}/edit'),
        ];
    }
}
