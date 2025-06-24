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

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'კონკურსები';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Competition Content')
                    ->tabs([
                        Tab::make('Georgian')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('Title (Georgian)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.ka')
                                    ->label('Content (Georgian)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('description.ka')
                                    ->label('Description (Georgian)')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(500),
                                Textarea::make('excerpt.ka')
                                    ->label('Excerpt (Georgian)')
                                    ->rows(2)
                                    ->maxLength(255),
                                Textarea::make('requirements.ka')
                                    ->label('Requirements (Georgian)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('Title (English)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.en')
                                    ->label('Content (English)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('description.en')
                                    ->label('Description (English)')
                                    ->required()
                                    ->rows(3)
                                    ->maxLength(500),
                                Textarea::make('excerpt.en')
                                    ->label('Excerpt (English)')
                                    ->rows(2)
                                    ->maxLength(255),
                                Textarea::make('requirements.en')
                                    ->label('Requirements (English)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Competition Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the title'),
                        
                        Select::make('category')
                            ->options([
                                'arts' => 'Arts',
                                'music' => 'Music',
                                'dance' => 'Dance',
                                'theater' => 'Theater',
                                'literature' => 'Literature',
                                'film' => 'Film',
                                'sports' => 'Sports',
                                'other' => 'Other',
                            ])
                            ->required()
                            ->searchable(),
                        
                        TextInput::make('prize_amount')
                            ->label('Prize Amount')
                            ->numeric()
                            ->prefix('₾')
                            ->helperText('Total prize amount in Georgian Lari'),
                        
                        TextInput::make('max_participants')
                            ->label('Max Participants')
                            ->numeric()
                            ->helperText('Maximum number of participants allowed'),
                        
                        TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->email()
                            ->required(),
                        
                        TextInput::make('contact_phone')
                            ->label('Contact Phone')
                            ->tel(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Timeline')
                    ->schema([
                        DateTimePicker::make('registration_deadline')
                            ->label('Registration Deadline')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('competition_start')
                            ->label('Competition Start')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('competition_end')
                            ->label('Competition End')
                            ->required()
                            ->default(now()),
                        
                        DateTimePicker::make('results_announcement')
                            ->label('Results Announcement Date')
                            ->default(now()),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Media & Settings')
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
                            ->label('Published')
                            ->default(true),
                        
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Is this competition currently accepting applications?'),
                        
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
                ImageColumn::make('featured_image')
                    ->label('ფოტო')
                    ->circular()
                    ->size(40),
                TextColumn::make('title')
                    ->label('Title (Georgian)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('title')
                    ->label('Title (English)')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'en'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->en', 'like', "%{$search}%");
                    }),
                TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                TextColumn::make('prize_amount')
                    ->label('Prize')
                    ->money('GEL')
                    ->sortable(),
                TextColumn::make('registration_deadline')
                    ->label('Registration Deadline')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('competition_start')
                    ->label('Start Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('application_form')
                    ->label('განაცხადის ფორმა')
                    ->url(fn ($record) => $record->application_form ? Storage::url($record->application_form) : null)
                    ->openUrlInNewTab()
                    ->toggleable(),
                ToggleColumn::make('is_published')
                    ->label('Published'),
                ToggleColumn::make('is_active')
                    ->label('Active'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'arts' => 'Arts',
                        'music' => 'Music',
                        'dance' => 'Dance',
                        'theater' => 'Theater',
                        'literature' => 'Literature',
                        'film' => 'Film',
                        'sports' => 'Sports',
                        'other' => 'Other',
                    ]),
                Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('registration_open')
                    ->query(fn (Builder $query): Builder => $query->where('registration_deadline', '>', now())),
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
