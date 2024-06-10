<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Speaker;
//use Illuminate\Http\Request;
//
//class SpeakerController extends Controller
//{
//    /**
//     * Display a listing of the speakers.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $speakers = Speaker::all();
//        return response()->json($speakers);
//    }
//
//    /**
//     * Store a newly created speaker in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//            'image' => 'nullable|string|max:255',
//            'short_description' => 'nullable|string|max:1000',
//            'long_description' => 'nullable|string|max:2000',
//            'social_media_links' => 'nullable|array',
//            'social_media_links.*' => 'string|url'
//        ]);
//
//        $speaker = Speaker::create($validatedData);
//        return response()->json($speaker, 201);
//    }
//
//    /**
//     * Display the specified speaker.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        return response()->json($speaker);
//    }
//
//    /**
//     * Update the specified speaker in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $validatedData = $request->validate([
//            'name' => 'string|max:255',
//            'company_name' => 'nullable|string|max:255',
//            'image' => 'nullable|string|max:255',
//            'short_description' => 'nullable|string|max:1000',
//            'long_description' => 'nullable|string|max:2000',
//            'social_media_links' => 'nullable|array',
//            'social_media_links.*' => 'string|url'
//        ]);
//
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        $speaker->update($validatedData);
//        return response()->json($speaker);
//    }
//
//    /**
//     * Remove the specified speaker from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        $speaker->delete();
//        return response()->json(['message' => 'Speaker deleted successfully']);
//    }
//}


//namespace App\Http\Controllers;
//
//use App\Models\Speaker;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
//
//class SpeakerController extends Controller
//{
//    /**
//     * Display a listing of the speakers.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $speakers = Speaker::all();
//        return response()->json($speakers);
//    }
//
//    /**
//     * Store a newly created speaker in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'short_description' => 'nullable|string|max:1000',
//            'long_description' => 'nullable|string|max:2000',
//            'social_media_links' => 'nullable|array',
//            'social_media_links.*' => 'string|url'
//        ]);
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('speakers', 'public');
//            $validatedData['image'] = $imagePath;
//        }
//
//        $speaker = Speaker::create($validatedData);
//        return response()->json($speaker, 201);
//    }
//
//    /**
//     * Display the specified speaker.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        return response()->json($speaker);
//    }
//
//    /**
//     * Update the specified speaker in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $validatedData = $request->validate([
//            'name' => 'nullable|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'short_description' => 'nullable|string|max:1000',
//            'long_description' => 'nullable|string|max:2000',
//            'social_media_links' => 'nullable|array',
//            'social_media_links.*' => 'string|url'
//        ]);
//
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        if ($request->hasFile('image')) {
//            // Delete the old image if it exists
//            if ($speaker->image) {
//                Storage::disk('public')->delete($speaker->image);
//            }
//
//            // Store the new image
//            $imagePath = $request->file('image')->store('speakers', 'public');
//            $validatedData['image'] = $imagePath;
//        }
//
//        // Update the speaker's details
//        $speaker->update($validatedData);
//
//        return response()->json($speaker);
//    }
//
//
//    /**
//     * Remove the specified speaker from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $speaker = Speaker::find($id);
//
//        if (!$speaker) {
//            return response()->json(['message' => 'Speaker not found'], 404);
//        }
//
//        // Delete the image if it exists
//        if ($speaker->image) {
//            Storage::disk('public')->delete($speaker->image);
//        }
//
//        $speaker->delete();
//        return response()->json(['message' => 'Speaker deleted successfully']);
//    }
//}


namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the speakers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        return response()->json($speakers);
    }

    /**
     * Store a newly created speaker in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:1000',
            'long_description' => 'nullable|string|max:2000',
            'social_media_links' => 'nullable|array',
            'social_media_links.*' => 'string|url'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        }

        $speaker = Speaker::create($validatedData);
        return response()->json($speaker, 201);
    }

    /**
     * Display the specified speaker.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaker = Speaker::find($id);

        if (!$speaker) {
            return response()->json(['message' => 'Speaker not found'], 404);
        }

        return response()->json($speaker);
    }

    /**
     * Update the specified speaker in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:1000',
            'long_description' => 'nullable|string|max:2000',
            'social_media_links' => 'nullable|array',
            'social_media_links.*' => 'string|url'
        ]);

        $speaker = Speaker::find($id);

        if (!$speaker) {
            return response()->json(['message' => 'Speaker not found'], 404);
        }

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        }

        $speaker->update($validatedData);
        return response()->json($speaker);
    }

    /**
     * Remove the specified speaker from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);

        if (!$speaker) {
            return response()->json(['message' => 'Speaker not found'], 404);
        }

        // Delete the image if it exists
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }

        $speaker->delete();
        return response()->json(['message' => 'Speaker deleted successfully']);
    }
}
