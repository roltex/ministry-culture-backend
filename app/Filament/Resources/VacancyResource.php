<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Filament\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'ვაკანსიები';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Vacancy Content')
                    ->tabs([
                        Tab::make('Georgian')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('Title (Georgian)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.ka')
                                    ->label('Description (Georgian)')
                                    ->required()
                                    ->columnSpanFull(),
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
                                RichEditor::make('description.en')
                                    ->label('Description (English)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('requirements.en')
                                    ->label('Requirements (English)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Job Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the title'),
                        
                        Select::make('department')
                            ->options([
                                'administration' => 'Administration',
                                'culture' => 'Culture',
                                'sports' => 'Sports',
                                'finance' => 'Finance',
                                'hr' => 'Human Resources',
                                'it' => 'Information Technology',
                                'legal' => 'Legal',
                                'public_relations' => 'Public Relations',
                                'other' => 'Other',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Select::make('employment_type')
                            ->options([
                                'full_time' => 'Full Time',
                                'part_time' => 'Part Time',
                                'contract' => 'Contract',
                                'temporary' => 'Temporary',
                                'internship' => 'Internship',
                            ])
                            ->required(),
                        
                        TextInput::make('salary_range')
                            ->label('Salary Range')
                            ->maxLength(255)
                            ->helperText('e.g., 2000-3000 GEL'),
                        
                        TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255),
                        
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
                        DatePicker::make('application_deadline')
                            ->label('Application Deadline')
                            ->required(),
                        
                        DatePicker::make('start_date')
                            ->label('Expected Start Date'),
                        
                        TextInput::make('duration')
                            ->label('Duration')
                            ->maxLength(255)
                            ->helperText('e.g., 6 months, Permanent'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Settings')
                    ->schema([
                        FileUpload::make('application_form')
                            ->label('განაცხადის ფორმა')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('vacancy-forms')
                            ->maxSize(10240)
                            ->helperText('PDF ფაილი (მაქს 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Is this vacancy currently accepting applications?'),
                        
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
                TextColumn::make('department')
                    ->badge()
                    ->searchable(),
                TextColumn::make('employment_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'full_time' => 'green',
                        'part_time' => 'blue',
                        'contract' => 'yellow',
                        'temporary' => 'orange',
                        'internship' => 'purple',
                    }),
                TextColumn::make('salary_range')
                    ->label('Salary')
                    ->searchable(),
                TextColumn::make('application_deadline')
                    ->label('Deadline')
                    ->date()
                    ->sortable(),
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
                SelectFilter::make('department')
                    ->options([
                        'administration' => 'Administration',
                        'culture' => 'Culture',
                        'sports' => 'Sports',
                        'finance' => 'Finance',
                        'hr' => 'Human Resources',
                        'it' => 'Information Technology',
                        'legal' => 'Legal',
                        'public_relations' => 'Public Relations',
                        'other' => 'Other',
                    ]),
                SelectFilter::make('employment_type')
                    ->options([
                        'full_time' => 'Full Time',
                        'part_time' => 'Part Time',
                        'contract' => 'Contract',
                        'temporary' => 'Temporary',
                        'internship' => 'Internship',
                    ]),
                Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('deadline_approaching')
                    ->query(fn (Builder $query): Builder => $query->where('application_deadline', '>', now())->where('application_deadline', '<', now()->addDays(7))),
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
