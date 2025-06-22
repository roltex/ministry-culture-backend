<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use App\Models\Competition;
use App\Models\Vacancy;
use App\Models\Legislation;
use App\Models\SubordinateInstitution;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'news' => News::count(),
            'projects' => Project::count(),
            'active_competitions' => Competition::where('is_active', true)->count(),
            'active_vacancies' => Vacancy::where('is_active', true)->count(),
            'legislation' => Legislation::count(),
            'institutions' => SubordinateInstitution::count(),
            'admin_users' => User::where('is_admin', true)->count(),
            'users' => User::count(),
        ]);
    }
} 