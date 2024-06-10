<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Stage;
//use Illuminate\Http\Request;
//
//class StageController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $stages = Stage::all();
//        return response()->json($stages);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'time' => 'required',
//            'title' => 'required',
//            'description' => 'required',
//            'presenter' => 'required',
//            'organization' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        $stage = new Stage();
//        $stage->name = $request->name; // Adding name to the Stage object
//        $stage->date = $request->date;
//        $stage->time = $request->time;
//        $stage->title = $request->title;
//        $stage->description = $request->description;
//        $stage->presenter = $request->presenter;
//        $stage->organization = $request->organization;
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $imageName);
//            $stage->image = '/images/' . $imageName;
//        }
//
//        $stage->save();
//
//        return response()->json(['message' => 'Stage created successfully', 'stage' => $stage]);
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Stage  $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Stage $stage)
//    {
//        return response()->json($stage);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Stage  $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Stage $stage)
//    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'time' => 'required',
//            'title' => 'required',
//            'description' => 'required',
//            'presenter' => 'required',
//            'organization' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        $stage->name = $request->name; // Update name field
//        $stage->date = $request->date;
//        $stage->time = $request->time;
//        $stage->title = $request->title;
//        $stage->description = $request->description;
//        $stage->presenter = $request->presenter;
//        $stage->organization = $request->organization;
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $imageName);
//            $stage->image = '/images/' . $imageName;
//        }
//
//        $stage->save();
//
//        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Stage  $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Stage $stage)
//    {
//        $stage->delete();
//        return response()->json(['message' => 'Stage deleted successfully']);
//    }
//}


//namespace App\Http\Controllers;
//
//use App\Models\Stage;
//use Illuminate\Http\Request;
//
//class StageController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $stages = Stage::all();
//        return response()->json($stages);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'time' => 'required',
//            'title' => 'required',
//            'description' => 'required',
//            'presenter' => 'required',
//            'organization' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'capacity' => 'required|integer'
//        ]);
//
//        $stage = new Stage();
//        $stage->name = $request->name;
//        $stage->date = $request->date;
//        $stage->time = $request->time;
//        $stage->title = $request->title;
//        $stage->description = $request->description;
//        $stage->presenter = $request->presenter;
//        $stage->organization = $request->organization;
//        $stage->capacity = $request->capacity;
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $imageName);
//            $stage->image = '/images/' . $imageName;
//        }
//
//        $stage->save();
//
//        return response()->json(['message' => 'Stage created successfully', 'stage' => $stage]);
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param \App\Models\Stage $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Stage $stage)
//    {
//        return response()->json($stage);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param \App\Models\Stage $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Stage $stage)
//    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'time' => 'required',
//            'title' => 'required',
//            'description' => 'required',
//            'presenter' => 'required',
//            'organization' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'capacity' => 'required|integer'
//        ]);
//
//        $stage->name = $request->name;
//        $stage->date = $request->date;
//        $stage->time = $request->time;
//        $stage->title = $request->title;
//        $stage->description = $request->description;
//        $stage->presenter = $request->presenter;
//        $stage->organization = $request->organization;
//        $stage->capacity = $request->capacity;
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $imageName);
//            $stage->image = '/images/' . $imageName;
//        }
//
//        $stage->save();
//
//        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param \App\Models\Stage $stage
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Stage $stage)
//    {
//        $stage->delete();
//        return response()->json(['message' => 'Stage deleted successfully']);
//    }
//}




namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * @param \Illuminate\Http\Request $request
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
            'capacity' => 'required|integer'
        ]);

        $stage = new Stage();
        $stage->name = $request->name;
        $stage->date = $request->date;
        $stage->time = $request->time;
        $stage->title = $request->title;
        $stage->description = $request->description;
        $stage->presenter = $request->presenter;
        $stage->organization = $request->organization;
        $stage->capacity = $request->capacity;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('stages', 'public');
            $stage->image = $imagePath;
        }

        $stage->save();

        return response()->json(['message' => 'Stage created successfully', 'stage' => $stage]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        return response()->json($stage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stage $stage
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Stage $stage)
//    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'time' => 'required',
//            'title' => 'required',
//            'description' => 'required',
//            'presenter' => 'required',
//            'organization' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'capacity' => 'required|integer'
//        ]);
//
//        $stage->name = $request->name;
//        $stage->date = $request->date;
//        $stage->time = $request->time;
//        $stage->title = $request->title;
//        $stage->description = $request->description;
//        $stage->presenter = $request->presenter;
//        $stage->organization = $request->organization;
//        $stage->capacity = $request->capacity;
//
//        if ($request->hasFile('image')) {
//            // Delete the old image if it exists
//            if ($stage->image) {
//                Storage::disk('public')->delete($stage->image);
//            }
//
//            // Store the new image
//            $imagePath = $request->file('image')->store('stages', 'public');
//            $stage->image = $imagePath;
//        }
//
//        $stage->save();
//
//        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
//    }
    public function update(Request $request, Stage $stage)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'presenter' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'capacity' => 'required|integer|min:1'
        ]);

        $stage->update($validatedData);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($stage->image) {
                Storage::disk('public')->delete($stage->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('stages', 'public');
            $stage->image = $imagePath;
            $stage->save();
        }

        return response()->json(['message' => 'Stage updated successfully', 'stage' => $stage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        // Delete the image if it exists
        if ($stage->image) {
            Storage::disk('public')->delete($stage->image);
        }

        $stage->delete();
        return response()->json(['message' => 'Stage deleted successfully']);
    }
}
