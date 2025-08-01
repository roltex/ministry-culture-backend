<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinistryStructureResource\Pages;
use App\Models\MinistryStructure;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class MinistryStructureResource extends Resource
{
    protected static ?string $model = MinistryStructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'სამინისტროს სტრუქტურა';
    protected static ?string $modelLabel = 'სამინისტროს სტრუქტურა';
    protected static ?string $pluralModelLabel = 'სამინისტროს სტრუქტურები';
    
    protected static ?int $navigationSort = 7;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Tabs::make('სტრუქტურის კონტენტი')
                ->tabs([
                    Tab::make('ქართული')->schema([
                        TextInput::make('name.ka')->label('დასახელება (ქართული)')->required(),
                        RichEditor::make('description.ka')->label('აღწერა (ქართული)'),
                        TextInput::make('address.ka')->label('მისამართი (ქართული)'),
                    ]),
                    Tab::make('ინგლისური')->schema([
                        TextInput::make('name.en')->label('დასახელება (ინგლისური)'),
                        RichEditor::make('description.en')->label('აღწერა (ინგლისური)'),
                        TextInput::make('address.en')->label('მისამართი (ინგლისური)'),
                    ]),
                ])->columnSpanFull(),
            TextInput::make('email')->label('ელ-ფოსტა')->email(),
            TextInput::make('phone')->label('ტელეფონი'),
            TextInput::make('sort_order')->label('სორტირების რიგი')->numeric()->default(0),
            FileUpload::make('image')->label('სურათი')->image()->directory('ministry-structure-images'),
            Repeater::make('attachments')
                ->relationship('attachments')
                ->label('დანართები')
                ->schema([
                    FileUpload::make('file')->label('ფაილი')->directory('ministry-structure-attachments')->required(),
                    TextInput::make('name')->label('ფაილის სახელი'),
                ])->columnSpanFull(),
            TextInput::make('facebook_url')->label('Facebook'),
            TextInput::make('twitter_url')->label('Twitter'),
            TextInput::make('instagram_url')->label('Instagram'),
            TextInput::make('linkedin_url')->label('LinkedIn'),
            TextInput::make('youtube_url')->label('YouTube'),
            TextInput::make('telegram_url')->label('Telegram'),
            Select::make('parent_id')
                ->label('მშობელი სტრუქტურა')
                ->options(fn () =>
                    MinistryStructure::all()->mapWithKeys(
                        fn ($item) => [$item->id => $item->getTranslation('name', 'ka')]
                    )
                )
                ->searchable()
                ->nullable(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->label('რიგი')->sortable(),
                TextColumn::make('name')->label('დასახელება')->formatStateUsing(fn ($state, $record) => $record?->getTranslation('name', 'ka'))->searchable(),
                TextColumn::make('email')->label('ელ-ფოსტა'),
                TextColumn::make('phone')->label('ტელეფონი'),
                TextColumn::make('parent.name')->label('მშობელი')->formatStateUsing(fn ($state, $record) => $record?->parent?->getTranslation('name', 'ka')),
                ImageColumn::make('image')->label('სურათი'),
            ])
            ->defaultSort('sort_order')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMinistryStructures::route('/'),
            'create' => Pages\CreateMinistryStructure::route('/create'),
            'edit' => Pages\EditMinistryStructure::route('/{record}/edit'),
        ];
    }
}
