<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProcurementResource;
use App\Models\Procurement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcurementController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = Procurement::query();
        $query->where('is_published', true);
        $procurements = $query->orderBy('published_at', 'desc')->paginate(12);
        return ProcurementResource::collection($procurements);
    }

    public function show($slug): JsonResource
    {
        $procurement = Procurement::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        return new ProcurementResource($procurement);
    }
}
