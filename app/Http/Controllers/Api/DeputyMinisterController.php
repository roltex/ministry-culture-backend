<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeputyMinisterResource;
use App\Models\DeputyMinister;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class DeputyMinisterController extends Controller
{
    public function index(): JsonResource
    {
        $deputyMinisters = DeputyMinister::active()
            ->orderBy('created_at', 'desc')
            ->get();

        return DeputyMinisterResource::collection($deputyMinisters);
    }

    public function show($id): JsonResource
    {
        $deputyMinister = DeputyMinister::active()
            ->findOrFail($id);

        return new DeputyMinisterResource($deputyMinister);
    }
} 