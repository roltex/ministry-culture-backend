<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Resources\PageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $pages = Page::orderBy('created_at', 'desc')
            ->paginate(12);

        return PageResource::collection($pages);
    }

    public function show($slug): JsonResource
    {
        $page = Page::where('slug', $slug)
            ->firstOrFail();

        return new PageResource($page);
    }

    public function featured(): JsonResource
    {
        $pages = Page::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return PageResource::collection($pages);
    }
}
