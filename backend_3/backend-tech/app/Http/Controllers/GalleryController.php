<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = Gallery::all();
        return response()->json($galleryItems);
    }

    public function show($id)
    {
        $galleryItem = Gallery::findOrFail($id);
        return response()->json($galleryItem);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_link' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $galleryItem = Gallery::create([
            'image_link' => $request->image_link,
            'description' => $request->description,
            'year' => $request->year,
        ]);

        return response()->json($galleryItem, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_link' => 'string|max:255',
            'description' => 'nullable|string',
            'year' => 'integer|min:1900|max:' . date('Y'),
        ]);

        $galleryItem = Gallery::findOrFail($id);
        $galleryItem->update($request->only(['image_link', 'description', 'year']));

        return response()->json($galleryItem);
    }

    public function destroy($id)
    {
        $galleryItem = Gallery::findOrFail($id);
        $galleryItem->delete();

        return response()->json(null, 204);
    }
}

