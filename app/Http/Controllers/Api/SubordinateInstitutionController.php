<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubordinateInstitution;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubordinateInstitutionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $institutions = SubordinateInstitution::active()
            ->ordered()
            ->paginate(12);

        return response()->json([
            'success' => true,
            'data' => $institutions->items(),
            'meta' => [
                'current_page' => $institutions->currentPage(),
                'last_page' => $institutions->lastPage(),
                'per_page' => $institutions->perPage(),
                'total' => $institutions->total(),
                'from' => $institutions->firstItem(),
                'to' => $institutions->lastItem(),
            ],
        ]);
    }

    public function featured(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $institutions = SubordinateInstitution::active()
            ->featured()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $institutions,
        ]);
    }

    public function show(Request $request, $id): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $institution = SubordinateInstitution::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $institution,
        ]);
    }

    public function showBySlug(Request $request, $slug): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $institution = SubordinateInstitution::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $institution,
        ]);
    }

    public function byType(Request $request, $type): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $institutions = SubordinateInstitution::active()
            ->where('type', $type)
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $institutions,
        ]);
    }

    public function types(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $types = SubordinateInstitution::active()
            ->distinct()
            ->pluck('type')
            ->filter()
            ->values();

        return response()->json([
            'success' => true,
            'data' => $types,
        ]);
    }
} 