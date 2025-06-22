<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
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

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'პროექტები';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Project Content')
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
                                    ->rows(3)
                                    ->maxLength(500),
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
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the title'),
                        
                        Select::make('status')
                            ->options([
                                'planned' => 'Planned',
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                            ])
                            ->required()
                            ->default('planned'),
                        
                        DatePicker::make('start_date')
                            ->label('Start Date'),
                        
                        DatePicker::make('end_date')
                            ->label('End Date'),
                        
                        TextInput::make('budget')
                            ->label('Budget')
                            ->numeric()
                            ->prefix('₾')
                            ->helperText('Project budget in Georgian Lari'),
                        
                        TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Media & Settings')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()
                            ->disk('public')
                            ->directory('project-images')
                            ->maxSize(2048)
                            ->helperText('Recommended size: 1200x630px'),
                        
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        
                        Toggle::make('is_featured')
                            ->label('Featured Project')
                            ->default(false),
                        
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
                    ->disk('public')
                    ->label('Image')
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
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'ongoing' => 'blue',
                        'completed' => 'green',
                    }),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('budget')
                    ->label('Budget')
                    ->money('GEL')
                    ->sortable(),
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
                SelectFilter::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                    ]),
                Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
