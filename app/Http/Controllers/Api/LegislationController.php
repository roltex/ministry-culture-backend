<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Legislation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LegislationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $query = Legislation::active();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->byCategory($request->category);
        }

        $legislation = $query->orderBy('enactment_date', 'desc')
            ->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $legislation->items(),
            'pagination' => [
                'current_page' => $legislation->currentPage(),
                'last_page' => $legislation->lastPage(),
                'per_page' => $legislation->perPage(),
                'total' => $legislation->total(),
            ],
        ]);
    }

    public function show(Request $request, $id): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $legislation = Legislation::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $legislation,
        ]);
    }

    public function categories(): JsonResponse
    {
        $legislation = new Legislation();
        
        return response()->json([
            'success' => true,
            'data' => $legislation->getCategories(),
        ]);
    }

    public function download(Request $request, $id): JsonResponse
    {
        $legislation = Legislation::findOrFail($id);
        $legislation->incrementDownloads();

        return response()->json([
            'success' => true,
            'data' => [
                'download_url' => $legislation->document_url,
                'download_count' => $legislation->download_count,
            ],
        ]);
    }
} 