<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OtherStructureResource\Pages;
use App\Models\OtherStructure;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class OtherStructureResource extends Resource
{
    protected static ?string $model = OtherStructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'სხვა სტრუქტურები';

    protected static ?string $modelLabel = 'სხვა სტრუქტურა';

    protected static ?string $pluralModelLabel = 'სხვა სტრუქტურები';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
                FileUpload::make('image')
                    ->label('სურათის ატვირთვა')
                    ->image()
                    ->imageEditor()

                    ->directory('other-structure-images'),
                TextInput::make('link')
                    ->label('ბმული')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(function ($record) {
                        return $record->getTranslation('title', 'ka');
                    })
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('სურათი')
                    ->circular(),
                TextColumn::make('link')
                    ->label('ბმული')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListOtherStructures::route('/'),
            'create' => Pages\CreateOtherStructure::route('/create'),
            'edit' => Pages\EditOtherStructure::route('/{record}/edit'),
        ];
    }
}
