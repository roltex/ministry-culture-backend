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
    
    protected static ?string $navigationGroup = 'სისტემა';
    
    protected static ?string $navigationLabel = 'მომხმარებლები';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->maxLength(255),
                        
                        FileUpload::make('avatar')
                            ->label('Profile Picture')
                            ->image()
                            ->directory('user-avatars')
                            ->maxSize(2048)
                            ->helperText('Profile picture (max 2MB)'),
                    ])
                    ->columns(2),
                
                Section::make('Account Settings')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->helperText('Minimum 8 characters'),
                        
                        TextInput::make('password_confirmation')
                            ->label('Confirm Password')
                            ->password()
                            ->dehydrated(false)
                            ->required(fn (string $context): bool => $context === 'create')
                            ->same('password'),
                        
                        Toggle::make('is_admin')
                            ->label('Admin Access')
                            ->default(false)
                            ->helperText('Grant full administrative access'),
                        
                        Toggle::make('is_active')
                            ->label('Active Account')
                            ->default(true)
                            ->helperText('Enable or disable user account'),
                        
                        DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->helperText('Leave empty if email is not verified'),
                    ])
                    ->columns(2),
                
                Section::make('Additional Information')
                    ->schema([
                        TextInput::make('position')
                            ->label('Position/Title')
                            ->maxLength(255)
                            ->helperText('User\'s position or title in the organization'),
                        
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
                            ->searchable()
                            ->helperText('User\'s department'),
                        
                        Textarea::make('bio')
                            ->label('Biography')
                            ->rows(4)
                            ->maxLength(1000)
                            ->helperText('Short biography or description'),
                        
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn Profile')
                            ->url()
                            ->prefix('https://'),
                        
                        TextInput::make('twitter_url')
                            ->label('Twitter Profile')
                            ->url()
                            ->prefix('https://'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('Position')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('department')
                    ->label('Department')
                    ->badge()
                    ->searchable(),
                ToggleColumn::make('is_admin')
                    ->label('Admin'),
                ToggleColumn::make('is_active')
                    ->label('Active'),
                TextColumn::make('email_verified_at')
                    ->label('Email Verified')
                    ->dateTime()
                    ->sortable(),
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
                Filter::make('admins')
                    ->query(fn (Builder $query): Builder => $query->where('is_admin', true)),
                Filter::make('active_users')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('verified_emails')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
