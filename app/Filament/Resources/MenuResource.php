<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationLabel = 'მენიუ';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('მენიუს ინფორმაცია')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('label.ka')
                                    ->label('დასახელება (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('label.en')
                                    ->label('დასახელება (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ])
                    ->columnSpanFull(),
                TextInput::make('url')
                    ->label('URL')
                    ->maxLength(255),
                TextInput::make('icon')
                    ->label('Icon')
                    ->maxLength(100),
                Select::make('parent_id')
                    ->label('Parent Menu')
                    ->relationship('parent', 'label')
                    ->searchable()
                    ->preload(),
                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
                Select::make('target')
                    ->label('Target')
                    ->options([
                        '_self' => 'Same Tab',
                        '_blank' => 'New Tab',
                    ])
                    ->default('_self'),
                Select::make('type')
                    ->label('Type')
                    ->options([
                        'link' => 'Link',
                        'page' => 'Page',
                        'external' => 'External',
                    ])
                    ->default('link'),
                TextInput::make('page_slug')
                    ->label('Page Slug')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label_ka')
                    ->label('დასახელება (ქარ)')
                    ->getStateUsing(fn ($record) => $record->getTranslation('label', 'ka'))
                    ->formatStateUsing(function ($state, $record) {
                        $indent = '';
                        $icon = '';
                        $depth = 0;
                        $parent = $record->parent;
                        while ($parent) {
                            $depth++;
                            $parent = $parent->parent;
                        }
                        if ($depth > 0) {
                            $indent = str_repeat('    ', $depth); // 4 real spaces per level
                            $icon = '⮑ ';
                        }
                        return $indent . $icon . $state;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('label_en')
                    ->label('დასახელება (ინგ)')
                    ->getStateUsing(fn ($record) => $record->getTranslation('label', 'en'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('რიგი'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('აქტიური'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderByRaw('COALESCE(parent_id, id), parent_id IS NOT NULL, sort_order');
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->is_admin ?? false;
    }
}
