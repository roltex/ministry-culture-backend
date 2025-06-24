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

class LegislationResource extends Resource
{
    protected static ?string $model = Legislation::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'კანონმდებლობა';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Legislation Content')
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
                                RichEditor::make('content.ka')
                                    ->label('Content (Georgian)')
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
                                RichEditor::make('content.en')
                                    ->label('Content (English)')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Document Details')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the title'),
                        
                        TextInput::make('act_number')
                            ->label('Act Number')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Official document number or reference'),
                        
                        Select::make('document_type')
                            ->options([
                                'Law' => 'Law',
                                'Decree' => 'Decree',
                                'Regulation' => 'Regulation',
                                'Order' => 'Order',
                                'Resolution' => 'Resolution',
                                'Guideline' => 'Guideline',
                                'Policy' => 'Policy',
                                'Other' => 'Other',
                            ])
                            ->required()
                            ->searchable(),
                        
                        DatePicker::make('adoption_date')
                            ->label('Adoption Date')
                            ->required(),
                        
                        DatePicker::make('effective_date')
                            ->label('Effective Date')
                            ->required(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Files & Settings')
                    ->schema([
                        FileUpload::make('document_file')
                            ->label('Document File')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->required()
                            ->helperText('PDF document (max 10MB)'),
                        
                        FileUpload::make('document_file_ka')
                            ->label('Document File (Georgian)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->helperText('PDF document in Georgian (max 10MB)'),
                        
                        FileUpload::make('document_file_en')
                            ->label('Document File (English)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('legislation-documents')
                            ->maxSize(10240)
                            ->helperText('PDF document in English (max 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        
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
                TextColumn::make('act_number')
                    ->label('Act #')
                    ->searchable()
                    ->sortable(),
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
                TextColumn::make('document_type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('adoption_date')
                    ->label('Adoption Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('effective_date')
                    ->label('Effective Date')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Published'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('document_type')
                    ->options([
                        'Law' => 'Law',
                        'Decree' => 'Decree',
                        'Regulation' => 'Regulation',
                        'Order' => 'Order',
                        'Resolution' => 'Resolution',
                        'Guideline' => 'Guideline',
                        'Policy' => 'Policy',
                        'Other' => 'Other',
                    ]),
                Filter::make('published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
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
