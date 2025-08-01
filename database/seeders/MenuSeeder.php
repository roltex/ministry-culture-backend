<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::truncate();

        $menus = require __DIR__ . '/../menu_export.php';

        foreach ($menus as $menuData) {
            Menu::create($menuData);
        }

        $this->command->info('Menus seeded with current database data!');
    }
}