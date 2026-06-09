<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseCrudController extends Controller
{
    protected string $model;

    public function index()
    {
        return response()->json(['data' => ($this->model)::latest()->paginate(15)]);
    }

    public function store(Request $request)
    {
        $item = ($this->model)::create($request->all());

        return response()->json(['message' => 'Created.', 'data' => $item], 201);
    }

    public function show(int $id)
    {
        return response()->json(['data' => ($this->model)::findOrFail($id)]);
    }

    public function update(Request $request, int $id)
    {
        $item = ($this->model)::findOrFail($id);
        $item->update($request->all());

        return response()->json(['message' => 'Updated.', 'data' => $item]);
    }

    public function destroy(int $id)
    {
        ($this->model)::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted.']);
    }
}
