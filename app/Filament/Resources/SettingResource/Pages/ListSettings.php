<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Resources\Pages\Page;
use Illuminate\Http\RedirectResponse;

class ListSettings extends Page
{
    protected static string $resource = \App\Filament\Resources\SettingResource::class;
    protected static string $view = 'filament.resources.settings.dummy';

    public function mount(): RedirectResponse
    {
        return redirect(static::getResource()::getUrl('edit'));
    }
} 