<?php

use Illuminate\Support\Facades\App;

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Menu;

$menus = Menu::all()->map(function ($menu) {
    return [
        'label' => $menu->getTranslations('label'),
        'url' => $menu->url,
        'icon' => $menu->icon,
        'parent_id' => $menu->parent_id,
        'sort_order' => $menu->sort_order,
        'is_active' => $menu->is_active,
        'target' => $menu->target,
        'type' => $menu->type,
        'page_slug' => $menu->page_slug,
    ];
})->toArray();

file_put_contents(__DIR__ . '/menu_export.php', "<?php\nreturn " . var_export($menus, true) . ";\n");

echo "Menu exported to menu_export.php\n"; 