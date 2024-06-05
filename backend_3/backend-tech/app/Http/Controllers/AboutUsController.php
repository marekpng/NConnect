<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsItems = AboutUs::all();
        return response()->json($aboutUsItems);
    }

    public function show($id)
    {
        $aboutUsItem = AboutUs::findOrFail($id);
        return response()->json($aboutUsItem);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_link' => 'required|string|max:255',
            'quote' => 'required|string',
        ]);

        $aboutUsItem = AboutUs::create([
            'image_link' => $request->image_link,
            'quote' => $request->quote,
        ]);

        return response()->json($aboutUsItem, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_link' => 'string|max:255',
            'quote' => 'string',
        ]);

        $aboutUsItem = AboutUs::findOrFail($id);
        $aboutUsItem->update($request->only(['image_link', 'quote']));

        return response()->json($aboutUsItem);
    }

    public function destroy($id)
    {
        $aboutUsItem = AboutUs::findOrFail($id);
        $aboutUsItem->delete();

        return response()->json(null, 204);
    }
}
