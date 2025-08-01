<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Competition::query();

        if ($request->input('status') === 'active') {
            $query->active();
        }

        $competitions = $query->published()
            ->orderBy('application_deadline', 'desc')
            ->paginate(12);

        return CompetitionResource::collection($competitions);
    }

    public function show($slug): JsonResource
    {
        $competition = Competition::where('slug', $slug)
            ->published()
            ->firstOrFail();

        return new CompetitionResource($competition);
    }

    public function active(): JsonResource
    {
        $competitions = Competition::active()
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        return CompetitionResource::collection($competitions);
    }
} 