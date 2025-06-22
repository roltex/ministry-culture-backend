<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    public function mount($record = null): void
    {
        // Always get the first settings record or create one if it doesn't exist
        $setting = Setting::first();
        
        if (!$setting) {
            $setting = Setting::create([
                'site_name' => ['ka' => 'კულტურის სამინისტრო', 'en' => 'Ministry of Culture'],
                'site_description' => ['ka' => 'საქართველოს კულტურის სამინისტრო', 'en' => 'Ministry of Culture of Georgia'],
                'contact_email' => 'info@culture.gov.ge',
                'contact_phone' => '+995 32 2 000 000',
                'enable_news' => true,
                'enable_projects' => true,
                'enable_competitions' => true,
                'enable_vacancies' => true,
                'enable_legislation' => true,
                'enable_institutions' => true,
                'news_per_page' => 12,
                'projects_per_page' => 12,
                'enable_search' => true,
            ]);
        }
        
        $this->record = $setting;
        $this->authorizeAccess();
        
        $this->fillForm();
        
        $this->previousUrl = url()->previous();
    }

    protected function getHeaderActions(): array
    {
        return [
            // No delete action since we always need one settings record
        ];
    }
}
