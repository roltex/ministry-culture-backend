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
use Illuminate\Support\Facades\Storage;
use App\Utils\GeorgianTransliterator;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'პროექტები';
    protected static ?string $modelLabel = 'პროექტი';
    protected static ?string $pluralModelLabel = 'პროექტები';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('პროექტის კონტენტი')
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
                                Textarea::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('პროექტის დეტალები')
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
                        
                        Select::make('status')
                            ->options([
                                'planned' => 'დაგეგმილი',
                                'ongoing' => 'მიმდინარე',
                                'completed' => 'დასრულებული',
                            ])
                            ->label('სტატუსი')
                            ->required()
                            ->default('planned'),
                        
                        DatePicker::make('start_date')
                            ->label('დაწყების თარიღი'),
                        
                        DatePicker::make('end_date')
                            ->label('დასრულების თარიღი'),
                        
                        TextInput::make('budget')
                            ->label('ბიუჯეტი')
                            ->numeric()
                            ->prefix('₾')
                            ->helperText('პროექტის ბიუჯეტი ლარში'),
                        
                        TextInput::make('location')
                            ->label('ადგილმდებარეობა')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('მედია და პარამეტრები')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('ფოტო')
                            ->image()
                            ->directory('project-images')
                            ->maxSize(2048)
                            ->helperText('რეკომენდებული ზომა: 1200x630px'),
                        
                        FileUpload::make('gallery')
                            ->label('გალერეა')
                            ->image()
                            ->multiple()
                            ->directory('project-images')
                            ->maxSize(2048)
                            ->maxFiles(10)
                            ->helperText('ატვირთეთ მაქსიმუმ 10 სურათი (თითოეული მაქს. 2MB)'),
                        
                        FileUpload::make('attachments')
                            ->label('დანართები')
                            ->disk('public')
                            ->directory('project-attachments')
                            ->multiple()
                            ->maxFiles(5)
                            ->maxSize(10240)
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                            ->helperText('შეგიძლიათ ატვირთოთ მაქსიმუმ 5 ფაილი (PDF, Word, Excel - თითოეული მაქს. 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        Toggle::make('is_featured')
                            ->label('რჩეული პროექტი')
                            ->default(false),
                        
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
                TextColumn::make('status')
                    ->label('სტატუსი')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planned' => 'gray',
                        'ongoing' => 'blue',
                        'completed' => 'green',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'planned' => 'დაგეგმილი',
                        'ongoing' => 'მიმდინარე',
                        'completed' => 'დასრულებული',
                        default => $state,
                    }),
                TextColumn::make('start_date')
                    ->label('დაწყების თარიღი')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('დასრულების თარიღი')
                    ->date()
                    ->sortable(),
                TextColumn::make('budget')
                    ->label('ბიუჯეტი')
                    ->money('GEL')
                    ->sortable(),
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
                SelectFilter::make('status')
                    ->options([
                        'planned' => 'დაგეგმილი',
                        'ongoing' => 'მიმდინარე',
                        'completed' => 'დასრულებული',
                    ])
                    ->label('სტატუსი'),
                Filter::make('published')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('featured')
                    ->label('რჩეული')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
