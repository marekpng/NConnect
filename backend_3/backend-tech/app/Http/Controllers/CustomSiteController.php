<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomSite;

class CustomSiteController extends Controller
{
    public function index()
    {
        try {
            $customSites = CustomSite::all()->map(function ($customSite) {
                return [
                    'id' => $customSite->id,
                    'name' => $customSite->name,
                    'path' => $customSite->path,
                    'myFile' => $customSite->myFile,
                ];
            });

            return response()->json($customSites);
        } catch (\Exception $e) {
            \Log::error('Failed to fetch custom sites: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch custom sites'], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|unique:custom_sites,path|max:255',
            'myFile' => 'required|string',
        ]);

        try {
            $customSite = CustomSite::create([
                'name' => $request->name,
                'path' => $request->path,
                'myFile' => $request->myFile,
            ]);

            return response()->json($customSite, 201);
        } catch (\Exception $e) {
            \Log::error('Failed to save custom site: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save custom site'], 500);
        }
    }

    public function show($id)
    {
        try {
            $customSite = CustomSite::findOrFail($id);

            return response()->json([
                'id' => $customSite->id,
                'name' => $customSite->name,
                'path' => $customSite->path,
                'myFile' => $customSite->myFile,
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to fetch custom site: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch custom site'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'path' => 'sometimes|required|string|unique:custom_sites,path,' . $id . '|max:255',
            'myFile' => 'sometimes|required|string',
        ]);

        try {
            $customSite = CustomSite::findOrFail($id);
            $customSite->update([
                'name' => $request->name,
                'path' => $request->path,
                'myFile' => $request->myFile,
            ]);

            return response()->json([
                'id' => $customSite->id,
                'name' => $customSite->name,
                'path' => $customSite->path,
                'myFile' => $customSite->myFile,
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to update custom site: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update custom site'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $customSite = CustomSite::findOrFail($id);
            $customSite->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            \Log::error('Failed to delete custom site: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete custom site'], 500);
        }
    }

    public function showByPath($path)
    {
        try {
            $customSite = CustomSite::where('path', $path)->firstOrFail();

            return response()->json([
                'id' => $customSite->id,
                'name' => $customSite->name,
                'path' => $customSite->path,
                'myFile' => $customSite->myFile,
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to fetch custom site by path: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch custom site by path'], 500);
        }
    }
}
