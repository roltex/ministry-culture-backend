<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeputyMinisterResource\Pages;
use App\Filament\Resources\DeputyMinisterResource\RelationManagers;
use App\Models\DeputyMinister;
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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;

class DeputyMinisterResource extends Resource
{
    protected static ?string $model = DeputyMinister::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'მინისტრის მოადგილეები';
    
    protected static ?string $modelLabel = 'მინისტრის მოადგილე';
    
    protected static ?string $pluralModelLabel = 'მინისტრის მოადგილეები';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('მინისტრის მოადგილის ინფორმაცია')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                Section::make('ძირითადი ინფორმაცია')
                                    ->schema([
                                        TextInput::make('first_name.ka')
                                            ->label('სახელი')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('last_name.ka')
                                            ->label('გვარი')
                                            ->required()
                                            ->maxLength(255),
                                        RichEditor::make('description.ka')
                                            ->label('აღწერა')
                                            ->columnSpanFull()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                                'blockquote',
                                            ]),
                                    ])
                                    ->columns(2),
                                
                                Section::make('საკონტაქტო ინფორმაცია')
                                    ->schema([
                                        TextInput::make('phone')
                                            ->label('ტელეფონი')
                                            ->tel()
                                            ->maxLength(255),
                                        TextInput::make('email')
                                            ->label('ელ-ფოსტა')
                                            ->email()
                                            ->maxLength(255),
                                        TextInput::make('contact_info.ka')
                                            ->label('დამატებითი საკონტაქტო ინფორმაცია')
                                            ->maxLength(500),
                                    ])
                                    ->columns(2),
                            ]),
                        
                        Tab::make('English')
                            ->schema([
                                Section::make('Basic Information')
                                    ->schema([
                                        TextInput::make('first_name.en')
                                            ->label('First Name')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('last_name.en')
                                            ->label('Last Name')
                                            ->required()
                                            ->maxLength(255),
                                        RichEditor::make('description.en')
                                            ->label('Description')
                                            ->columnSpanFull()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                                'blockquote',
                                            ]),
                                    ])
                                    ->columns(2),
                                
                                Section::make('Contact Information')
                                    ->schema([
                                        TextInput::make('contact_info.en')
                                            ->label('Additional Contact Information')
                                            ->maxLength(500),
                                    ])
                                    ->columns(1),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Section::make('სოციალური ქსელები')
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('twitter_url')
                            ->label('Twitter URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('telegram_url')
                            ->label('Telegram URL')
                            ->url()
                            ->prefix('https://'),
                    ])
                    ->columns(2),
                
                Section::make('ფაილები')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('ფოტო')
                            ->image()
                            
                            
                            ->directory('deputy-minister-photos')
                            ->maxSize(2048)
                            ->helperText('მინისტრის მოადგილის ფოტო (მაქს 2MB)'),
                        
                        FileUpload::make('attachments')
                            ->label('დანართები')
                            
                            
                            ->multiple()
                            ->directory('deputy-minister-attachments')
                            ->maxSize(5120)
                            ->helperText('დანართები (მაქს 5MB თითოეული)'),
                    ])
                    ->columns(2),
                
                Toggle::make('is_active')
                    ->label('აქტიური')
                    ->default(true)
                    ->helperText('მინისტრის მოადგილე არის აქტიური თუ არა'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                                ImageColumn::make('photo')
                    ->label('ფოტო')
                    ->circular()
                    ->size(50),
                TextColumn::make('first_name')
                    ->label('სახელი')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($record) => $record->getTranslation('first_name', 'ka')),
                TextColumn::make('last_name')
                    ->label('გვარი')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($record) => $record->getTranslation('last_name', 'ka')),
                TextColumn::make('description')
                    ->label('აღწერა')
                    ->limit(50)
                    ->searchable()
                    ->formatStateUsing(fn ($record) => $record->getTranslation('description', 'ka')),
                TextColumn::make('phone')
                    ->label('ტელეფონი')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('ელ-ფოსტა')
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('აქტიური'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('განახლების თარიღი')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListDeputyMinisters::route('/'),
            'create' => Pages\CreateDeputyMinister::route('/create'),
            'edit' => Pages\EditDeputyMinister::route('/{record}/edit'),
        ];
    }
}
