<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Vacancy::query();

        if ($request->input('status') === 'active') {
            $query->active();
        }

        $vacancies = $query->published()
            ->orderBy('application_deadline', 'desc')
            ->paginate(12);

        return VacancyResource::collection($vacancies);
    }

    public function show($slug): JsonResource
    {
        $vacancy = Vacancy::where('slug', $slug)
            ->published()
            ->firstOrFail();
            
        return new VacancyResource($vacancy);
    }

    public function active(): JsonResource
    {
        $vacancies = Vacancy::active()
            ->published()
            ->limit(5)
            ->get();

        return VacancyResource::collection($vacancies);
    }
} 