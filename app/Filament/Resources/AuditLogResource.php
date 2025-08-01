<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditLogResource\Pages;
use App\Models\AuditLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;

class AuditLogResource extends Resource
{
    protected static ?string $model = AuditLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'სისტემის მართვა';

    protected static ?string $navigationLabel = 'აუდიტის ისტორია';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('აუდიტის ინფორმაცია')
                    ->schema([
                        TextColumn::make('event_name')
                            ->label('მოვლენა')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Created' => 'success',
                                'Updated' => 'info',
                                'Deleted' => 'danger',
                                'Published' => 'success',
                                'Unpublished' => 'warning',
                                default => 'gray',
                            }),
                        TextColumn::make('model_name')
                            ->label('კონტენტის ტიპი'),
                        TextColumn::make('description')
                            ->label('აღწერა'),
                        TextColumn::make('user_name')
                            ->label('მომხმარებელი'),
                        TextColumn::make('created_at')
                            ->label('თარიღი და დრო')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event')
                    ->label('მოვლენა')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'created' => 'success',
                        'updated' => 'info',
                        'deleted' => 'danger',
                        'published' => 'success',
                        'unpublished' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'created' => 'შეიქმნა',
                        'updated' => 'განახლდა',
                        'deleted' => 'წაიშალა',
                        'published' => 'გამოქვეყნდა',
                        'unpublished' => 'გამოქვეყნება გაუქმდა',
                        default => ucfirst($state),
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('auditable_type')
                    ->label('კონტენტის ტიპი')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'App\Models\News' => 'სიახლეები',
                        'App\Models\Calendar' => 'კალენდარი',
                        'App\Models\Competition' => 'კონკურსი',
                        'App\Models\Project' => 'პროექტი',
                        'App\Models\Procurement' => 'მიმწოდებლობა',
                        'App\Models\Vacancy' => 'ვაკანსია',
                        'App\Models\LegalAct' => 'სამართლებრივი აქტი',
                        'App\Models\Legislation' => 'კანონმდებლობა',
                        'App\Models\Report' => 'ანგარიში',
                        'App\Models\SubordinateInstitution' => 'დაქვემდებარებული დაწესებულება',
                        'App\Models\Page' => 'გვერდი',
                        default => class_basename($state),
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('აღწერა')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('user_name')
                    ->label('მომხმარებელი')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label('IP მისამართი')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('თარიღი და დრო')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('event')
                    ->options([
                        'created' => 'შეიქმნა',
                        'updated' => 'განახლდა',
                        'deleted' => 'წაიშალა',
                        'published' => 'გამოქვეყნდა',
                        'unpublished' => 'გამოქვეყნება გაუქმდა',
                    ])
                    ->label('მოვლენის ტიპი'),

                SelectFilter::make('auditable_type')
                    ->options([
                        'App\Models\News' => 'სიახლეები',
                        'App\Models\Calendar' => 'კალენდარი',
                        'App\Models\Competition' => 'კონკურსი',
                        'App\Models\Project' => 'პროექტი',
                        'App\Models\Procurement' => 'მიმწოდებლობა',
                        'App\Models\Vacancy' => 'ვაკანსია',
                        'App\Models\LegalAct' => 'სამართლებრივი აქტი',
                        'App\Models\Legislation' => 'კანონმდებლობა',
                        'App\Models\Report' => 'ანგარიში',
                        'App\Models\SubordinateInstitution' => 'დაქვემდებარებული დაწესებულება',
                        'App\Models\Page' => 'გვერდი',
                    ])
                    ->label('კონტენტის ტიპი'),

                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('შეიქმნა დან'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('შეიქმნა მდე'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->label('თარიღის დიაპაზონი'),
            ])
            ->actions([
                Action::make('view_details')
                    ->label('დეტალების ნახვა')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('აუდიტის ლოგის დეტალები')
                    ->modalContent(function (AuditLog $record) {
                        return view('filament.resources.audit-log-resource.modals.audit-details', [
                            'record' => $record
                        ]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('დახურვა'),
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
            'index' => Pages\ListAuditLogs::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function canView($record): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->is_admin ?? false;
    }
}
