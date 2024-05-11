<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return response()->json($stages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
            'presenter' => 'required',
            'organization' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stage = new Stage();
        $stage->name = $request->name; // Adding name to the Stage object
        $stage->date = $request->date;
        $stage->time = $request->time;
        $stage->title = $request->title;
        $stage->description = $request->description;
        $stage->presenter = $request->presenter;
        $stage->organization = $request->organization;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $stage->image = '/images/' . $imageName;
        }

        $stage->save();

        return response()->json(['message' => 'Stage created successfully', 'stage' => $stage]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        return response()->json($stage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
            'presenter' => 'required',
            'organization' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stage->name = $request->name; // Update name field
        $stage->date = $request->date;
        $stage->time = $request->time;
        $stage->title = $request->title;
        $stage->description = $request->description;
        $stage->presenter = $request->presenter;
        $stage->organization = $request->organization;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $stage->image = '/images/' . $imageName;
        }

        $stage->save();

        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return response()->json(['message' => 'Stage deleted successfully']);
    }
}
