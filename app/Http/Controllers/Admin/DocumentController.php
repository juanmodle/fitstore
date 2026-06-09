<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('admin.simple.index', [
            'title' => 'Documents',
            'route' => 'documents',
            'rows' => Document::latest()->paginate(15),
            'columns' => ['title', 'description', 'document_type', 'file_path'],
        ]);
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create Documents',
            'route' => 'documents',
            'model' => new Document(),
            'fields' => ['title', 'description', 'document_type', 'file_path', 'related_model', 'related_id'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Document::create($this->cleanBooleans($data));

        return redirect()->route('admin.documents.index')->with('success', 'Documents item created.');
    }

    public function edit(Document $document)
    {
        return view('admin.simple.form', [
            'title' => 'Edit Documents',
            'route' => 'documents',
            'model' => $document,
            'fields' => ['title', 'description', 'document_type', 'file_path', 'related_model', 'related_id'],
        ]);
    }

    public function update(Request $request, Document $document)
    {
        $data = $request->validate($this->rules());
        $document->update($this->cleanBooleans($data));

        return redirect()->route('admin.documents.index')->with('success', 'Documents item updated.');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return back()->with('success', 'Documents item deleted.');
    }

    private function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file_path' => ['sometimes', 'required', 'string', 'max:255'],
            'document_type' => ['sometimes', 'required', 'string', 'max:80'],
            'related_model' => ['nullable', 'string', 'max:255'],
            'related_id' => ['nullable', 'integer'],
        ];
    }

    private function cleanBooleans(array $data): array
    {
        foreach (['is_vip_only', 'is_active'] as $key) {
            if (array_key_exists($key, $data)) {
                $data[$key] = (bool) $data[$key];
            }
        }

        return $data;
    }
}
