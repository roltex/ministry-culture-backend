<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsController extends Controller
{
    public function index(): JsonResource
    {
        $news = News::published()
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return NewsResource::collection($news);
    }

    public function show($slug): JsonResource
    {
        $news = News::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $news->incrementViews();

        return new NewsResource($news);
    }

    public function featured(): JsonResource
    {
        $news = News::featured()
            ->limit(6)
            ->get();

        return NewsResource::collection($news);
    }
} 