<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'სისტემის მართვა';
    
    protected static ?string $navigationLabel = 'მომხმარებლები';
    protected static ?string $modelLabel = 'მომხმარებელი';
    protected static ?string $pluralModelLabel = 'მომხმარებლები';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('მომხმარებლის ინფორმაცია')
                    ->schema([
                        TextInput::make('name')
                            ->label('სახელი')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('ელ-ფოსტა')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        TextInput::make('password')
                            ->label('პაროლი')
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create'),
                        Select::make('role')
                            ->label('როლი')
                            ->options([
                                'admin' => 'ადმინისტრატორი',
                                'editor' => 'რედაქტორი',
                                'viewer' => 'ნახვა',
                            ])
                            ->required()
                            ->default('viewer'),
                        FileUpload::make('avatar')
                            ->label('ავატარი')
                            ->image()
                            
                            
                            ->directory('user-avatars')
                            ->maxSize(1024)
                            ->helperText('ავატარი (მაქს 1MB)'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('დამატებითი ინფორმაცია')
                    ->schema([
                        TextInput::make('phone')
                            ->label('ტელეფონი')
                            ->tel(),
                        TextInput::make('position')
                            ->label('თანამდებობა')
                            ->maxLength(255),
                        Textarea::make('bio')
                            ->label('ბიოგრაფია')
                            ->rows(3)
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('აქტიური')
                            ->default(true),
                        DateTimePicker::make('email_verified_at')
                            ->label('ელ-ფოსტის დადასტურების თარიღი'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                                Tables\Columns\ImageColumn::make('avatar')
                    ->label('ავატარი')
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('name')
                    ->label('სახელი')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('ელ-ფოსტა')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('როლი')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'admin' => 'ადმინისტრატორი',
                        'editor' => 'რედაქტორი',
                        'viewer' => 'ნახვა',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'editor' => 'warning',
                        'viewer' => 'success',
                    }),
                Tables\Columns\TextColumn::make('position')
                    ->label('თანამდებობა')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('აქტიური')
                    ->boolean(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('დადასტურებული')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin' => 'ადმინისტრატორი',
                        'editor' => 'რედაქტორი',
                        'viewer' => 'ნახვა',
                    ])
                    ->label('როლი'),
                Filter::make('active')
                    ->label('აქტიური')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('verified')
                    ->label('დადასტურებული')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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

    public static function canView($record): bool
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
