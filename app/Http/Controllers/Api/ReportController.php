<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Report::query();
        $query->where('is_published', true);
        $reports = $query->orderBy('published_at', 'desc')->paginate(12);
        return ReportResource::collection($reports);
    }

    public function show($slug): JsonResource
    {
        $report = Report::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        return new ReportResource($report);
    }
}
