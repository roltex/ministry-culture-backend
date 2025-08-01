<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OtherStructureResource;
use App\Models\OtherStructure;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OtherStructureController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $structures = OtherStructure::orderBy('created_at', 'desc')->get();
        return OtherStructureResource::collection($structures);
    }

    public function show(OtherStructure $otherStructure): JsonResource
    {
        return new OtherStructureResource($otherStructure);
    }
}
