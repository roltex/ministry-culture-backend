<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Legislation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class LegislationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $query = Legislation::published();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->byDocumentType($request->category);
        }

        $legislation = $query->orderBy('adoption_date', 'desc')
            ->paginate(20);

        // Transform the data to include document URLs
        $legislation->getCollection()->transform(function ($item) {
            return $this->transformLegislationData($item);
        });

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

    public function show(Request $request, $slug): JsonResponse
    {
        $locale = $request->get('locale', 'ka');
        app()->setLocale($locale);

        $legislation = Legislation::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $this->transformLegislationData($legislation),
        ]);
    }

    public function categories(): JsonResponse
    {
        $legislation = new Legislation();
        
        return response()->json([
            'success' => true,
            'data' => $legislation->getDocumentTypes(),
        ]);
    }

    public function download(Request $request, $slug): JsonResponse
    {
        $legislation = Legislation::where('slug', $slug)->firstOrFail();
        $legislation->incrementDownloads();

        $response = [
            'download_count' => $legislation->download_count,
        ];

        // Add document URLs if files exist
        if ($legislation->document_file) {
            $response['document_url'] = Storage::url($legislation->document_file);
        }
        if ($legislation->document_file_ka) {
            $response['document_url_ka'] = Storage::url($legislation->document_file_ka);
        }
        if ($legislation->document_file_en) {
            $response['document_url_en'] = Storage::url($legislation->document_file_en);
        }

        return response()->json([
            'success' => true,
            'data' => $response,
        ]);
    }

    private function transformLegislationData($legislation)
    {
        $data = $legislation->toArray();
        
        // Add document URLs if files exist
        if ($legislation->document_file) {
            $data['document_url'] = Storage::url($legislation->document_file);
        }
        if ($legislation->document_file_ka) {
            $data['document_url_ka'] = Storage::url($legislation->document_file_ka);
        }
        if ($legislation->document_file_en) {
            $data['document_url_en'] = Storage::url($legislation->document_file_en);
        }
        
        // Add featured image URL if exists
        if ($legislation->featured_image) {
            $data['featured_image_url'] = Storage::url($legislation->featured_image);
        }

        return $data;
    }
} 