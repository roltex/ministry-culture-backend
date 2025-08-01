<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class LatestNews extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                News::query()
                    ->latest('published_at')
                    ->limit(5)
            )
            ->columns([
                                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->size(40),
                TextColumn::make('title.ka')
                    ->label('Title (Georgian)')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('title.en')
                    ->label('Title (English)')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (News $record): string => route('filament.admin.resources.news.edit', $record))
                    ->icon('heroicon-m-eye')
                    ->label('View'),
            ]);
    }
} 