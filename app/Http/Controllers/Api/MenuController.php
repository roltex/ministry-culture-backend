<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Menu::query();

        // Get root level menus with their children
        $menus = $query->root()
            ->active()
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return MenuResource::collection($menus);
    }

    public function show($id): JsonResource
    {
        $menu = Menu::with('children', 'parent')
            ->active()
            ->findOrFail($id);

        return new MenuResource($menu);
    }

    public function tree(): JsonResource
    {
        // Get complete menu tree structure
        $menus = Menu::root()
            ->active()
            ->with('descendants')
            ->orderBy('sort_order')
            ->get();

        return MenuResource::collection($menus);
    }

    public function byParent($parentId): JsonResource
    {
        $menus = Menu::where('parent_id', $parentId)
            ->active()
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return MenuResource::collection($menus);
    }

    public function types(): JsonResource
    {
        $types = [
            'link' => 'Link',
            'page' => 'Page',
            'external' => 'External',
        ];

        return new JsonResource($types);
    }

    public function targets(): JsonResource
    {
        $targets = [
            '_self' => 'Same Tab',
            '_blank' => 'New Tab',
        ];

        return new JsonResource($targets);
    }

    public function routes(): JsonResource
    {
        $routes = Menu::getAvailableRoutes();
        return new JsonResource($routes);
    }
} 