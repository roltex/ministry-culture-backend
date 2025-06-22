<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Project::query();

        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        $projects = $query->published()
            ->orderBy('start_date', 'desc')
            ->paginate(12);

        return ProjectResource::collection($projects);
    }

    public function show($slug): JsonResource
    {
        $project = Project::where('slug', $slug)
            ->published()
            ->firstOrFail();

        return new ProjectResource($project);
    }

    public function featured(): JsonResource
    {
        $projects = Project::featured()
            ->limit(4)
            ->get();

        return ProjectResource::collection($projects);
    }

    public function statuses(): JsonResource
    {
        // This can be improved by using a dedicated table or enum
        $statuses = [
            'active' => 'Active',
            'completed' => 'Completed',
            'planned' => 'Planned',
        ];

        return new JsonResource($statuses);
    }
} 