<?php

namespace App\Filament\Resources\RecentAuditActivityResource\Widgets;

use App\Models\AuditLog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentAuditActivity extends BaseWidget
{
    protected static ?string $heading = 'აუდიტის ჟურნალი';

    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AuditLog::query()
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
            )
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
                    }),

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
                    }),

                TextColumn::make('description')
                    ->label('აღწერა')
                    ->limit(50),

                TextColumn::make('user_name')
                    ->label('მომხმარებელი')
                    ->default('სისტემა'),

                TextColumn::make('created_at')
                    ->label('თარიღი და დრო')
                    ->dateTime()
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
