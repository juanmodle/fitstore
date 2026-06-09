<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaAsset;
use Illuminate\Http\Request;

class MediaAssetController extends Controller
{
    public function index()
    {
        return view('admin.media-assets.index', ['assets' => MediaAsset::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate(['file' => ['required', 'file', 'max:4096']]);
        $file = $request->file('file');
        $path = $file->store('media-assets', 'public');

        $asset = MediaAsset::create([
            'uploaded_by_user_id' => $request->user()->id,
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'alt_text' => $file->getClientOriginalName(),
        ]);

        return response()->json(['message' => 'Uploaded', 'asset' => $asset]);
    }
}
