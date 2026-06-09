<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Document::where('is_public', true)->get());
    }

    public function show(Document $document): JsonResponse
    {
        abort_unless($document->is_public || auth()->check(), 403);

        return response()->json($document);
    }
}
