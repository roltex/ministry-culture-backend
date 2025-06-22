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

class SubordinateInstitutionResource extends Resource
{
    protected static ?string $model = SubordinateInstitution::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'სსიპები';
    
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Institution Content')
                    ->tabs([
                        Tab::make('Georgian')
                            ->schema([
                                TextInput::make('name.ka')
                                    ->label('Name (Georgian)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.ka')
                                    ->label('Description (Georgian)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('mission.ka')
                                    ->label('Mission (Georgian)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Textarea::make('vision.ka')
                                    ->label('Vision (Georgian)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('Name (English)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.en')
                                    ->label('Description (English)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('mission.en')
                                    ->label('Mission (English)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Textarea::make('vision.en')
                                    ->label('Vision (English)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Institution Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the name'),
                        
                        Select::make('type')
                            ->options([
                                'museum' => 'Museum',
                                'theater' => 'Theater',
                                'library' => 'Library',
                                'archive' => 'Archive',
                                'cultural_center' => 'Cultural Center',
                                'sports_center' => 'Sports Center',
                                'academy' => 'Academy',
                                'institute' => 'Institute',
                                'agency' => 'Agency',
                                'foundation' => 'Foundation',
                                'other' => 'Other',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'under_construction' => 'Under Construction',
                                'temporarily_closed' => 'Temporarily Closed',
                                'permanently_closed' => 'Permanently Closed',
                            ])
                            ->required()
                            ->default('active'),
                        
                        TextInput::make('director_name')
                            ->label('Director Name')
                            ->maxLength(255),
                        
                        TextInput::make('establishment_year')
                            ->label('Establishment Year')
                            ->numeric()
                            ->minValue(1800)
                            ->maxValue(date('Y'))
                            ->helperText('Year when the institution was established'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        TextInput::make('address')
                            ->label('Address')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        
                        TextInput::make('phone')
                            ->label('Phone')
                            ->tel(),
                        
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),
                        
                        TextInput::make('website_url')
                            ->label('Website')
                            ->url()
                            ->helperText('Full URL including https://'),
                        
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
                
                Forms\Components\Section::make('Media & Settings')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('institution-logos')
                            ->maxSize(2048)
                            ->helperText('Institution logo (max 2MB)'),
                        
                        FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()
                            ->disk('public')
                            ->directory('institution-images')
                            ->maxSize(2048)
                            ->helperText('Featured image (max 2MB)'),
                        
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false)
                            ->helperText('Show this institution prominently'),
                        
                        DateTimePicker::make('published_at')
                            ->label('Publish Date')
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
                    ->disk('public')
                    ->label('Logo')
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->label('Name (Georgian)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('name->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('name')
                    ->label('Name (English)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'en'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('name->en', 'like', "%{$search}%");
                    }),
                TextColumn::make('type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'green',
                        'inactive' => 'gray',
                        'under_construction' => 'yellow',
                        'temporarily_closed' => 'orange',
                        'permanently_closed' => 'red',
                    }),
                TextColumn::make('director_name')
                    ->label('Director')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('establishment_year')
                    ->label('Est. Year')
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                ToggleColumn::make('is_published')
                    ->label('Published'),
                ToggleColumn::make('is_featured')
                    ->label('Featured'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'museum' => 'Museum',
                        'theater' => 'Theater',
                        'library' => 'Library',
                        'archive' => 'Archive',
                        'cultural_center' => 'Cultural Center',
                        'sports_center' => 'Sports Center',
                        'academy' => 'Academy',
                        'institute' => 'Institute',
                        'agency' => 'Agency',
                        'foundation' => 'Foundation',
                        'other' => 'Other',
                    ]),
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'under_construction' => 'Under Construction',
                        'temporarily_closed' => 'Temporarily Closed',
                        'permanently_closed' => 'Permanently Closed',
                    ]),
                Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
                Filter::make('active_status')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'active')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
