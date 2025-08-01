<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $calendars = Calendar::published()
            ->orderBy('event_date', 'asc')
            ->paginate(12);

        return response()->json([
            'success' => true,
            'data' => $calendars->items(),
            'meta' => [
                'current_page' => $calendars->currentPage(),
                'last_page' => $calendars->lastPage(),
                'per_page' => $calendars->perPage(),
                'total' => $calendars->total(),
                'from' => $calendars->firstItem(),
                'to' => $calendars->lastItem(),
            ],
        ]);
    }

    public function show(Request $request, $slug): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $calendar = Calendar::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $calendar->incrementViews();

        return response()->json([
            'success' => true,
            'data' => $calendar,
        ]);
    }

    public function featured(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $calendars = Calendar::featured()
            ->orderBy('event_date', 'asc')
            ->limit(6)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $calendars,
        ]);
    }

    public function upcoming(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $calendars = Calendar::upcoming()
            ->orderBy('event_date', 'asc')
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $calendars,
        ]);
    }
}
