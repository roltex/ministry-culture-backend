<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MinistryStructureResource;
use App\Models\MinistryStructure;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinistryStructureController extends Controller
{
    // Return the full structure as a tree
    public function index(Request $request): JsonResource
    {
        // Recursively eager load all children to unlimited depth with sorting
        $roots = MinistryStructure::root()->with([
            'attachments',
            'children' => function ($q) {
                $q->ordered()->with([
                    'attachments',
                    'children' => function ($q2) {
                        $q2->ordered()->with([
                            'attachments',
                            'children' => function ($q3) {
                                $q3->ordered()->with([
                                    'attachments',
                                    'children' => function ($q4) {
                                        $q4->ordered()->with([
                                            'attachments',
                                            'children' => function ($q5) {
                                                $q5->ordered()->with([
                                                    'attachments',
                                                    'children' // ...and so on
                                                ]);
                                            }
                                        ]);
                                    }
                                ]);
                            }
                        ]);
                    }
                ]);
            }
        ])->get();
        return MinistryStructureResource::collection($roots);
    }

    // Return a single structure with children and attachments
    public function show($id): JsonResource
    {
        $structure = MinistryStructure::with(['children' => function($q) {
            $q->ordered()->with(['children' => function($q2) {
                $q2->ordered();
            }]);
        }, 'attachments', 'parent'])
            ->findOrFail($id);
        return new MinistryStructureResource($structure);
    }
}
