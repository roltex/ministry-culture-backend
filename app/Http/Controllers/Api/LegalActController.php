<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LegalActResource;
use App\Models\LegalAct;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalActController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $query = LegalAct::query();
        $query->where('is_published', true);
        $legalActs = $query->orderBy('published_at', 'desc')->paginate(12);
        return LegalActResource::collection($legalActs);
    }

    public function show($slug): JsonResource
    {
        $legalAct = LegalAct::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        return new LegalActResource($legalAct);
    }
}
