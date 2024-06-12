<?php
//
//
//
//namespace App\Http\Controllers;
//
//use App\Models\Sponsor;
//use Illuminate\Http\Request;
//use Illuminate\Http\JsonResponse;
//use Illuminate\Support\Facades\Storage;
//
//class SponsorController extends Controller
//{
//    public function getAllSponsors()
//    {
//        $sponsors = Sponsor::all();
//        return response()->json($sponsors);
//    }
//
//    public function createSponsor(Request $request): JsonResponse
//    {
//        try {
//            // Validate input data
//            $validatedData = $request->validate([
//                'name' => 'required|string',
//                'email' => 'required|email',
//                'phone' => 'nullable|string',
//                'company_name' => 'nullable|string',
//                'position' => 'nullable|string',
//                'website_url' => 'nullable|url',
//                'sponsorship_type' => 'nullable|string|in:silver,gold,platinum',
//                'about_company' => 'nullable|string',
//                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            ]);
//
//            if ($request->hasFile('image')) {
//                $imagePath = $request->file('image')->store('sponsors', 'public');
//                $validatedData['image'] = $imagePath;
//            }
//
//            // Create the sponsor
//            $sponsor = Sponsor::create($validatedData);
//
//            return response()->json(['message' => 'Sponsor created successfully', 'sponsor' => $sponsor], 201);
//        } catch (\Exception $e) {
//            // Handle the exception and return an error response
//            return response()->json(['message' => 'Failed to create sponsor', 'error' => $e->getMessage()], 400);
//        }
//    }
//
//    public function updateSponsor(Request $request, $id): JsonResponse
//    {
//        try {
//            // Validate input data
//            $validatedData = $request->validate([
//                'name' => 'sometimes|required|string',
//                'email' => 'sometimes|required|email',
//                'phone' => 'nullable|string',
//                'company_name' => 'nullable|string',
//                'position' => 'nullable|string',
//                'website_url' => 'nullable|url',
//                'sponsorship_type' => 'nullable|string|in:silver,gold,platinum',
//                'about_company' => 'nullable|string',
//                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            ]);
//
//            $sponsor = Sponsor::findOrFail($id);
//
//            if ($request->hasFile('image')) {
//                if ($sponsor->image) {
//                    Storage::disk('public')->delete($sponsor->image);
//                }
//                $imagePath = $request->file('image')->store('sponsors', 'public');
//                $validatedData['image'] = $imagePath;
//            }
//
//            $sponsor->update($validatedData);
//
//            return response()->json(['message' => 'Sponsor updated successfully', 'sponsor' => $sponsor], 200);
//        } catch (\Exception $e) {
//            // Handle the exception and return an error response
//            return response()->json(['message' => 'Failed to update sponsor', 'error' => $e->getMessage()], 400);
//        }
//    }
//
//    public function deleteSponsor($id): JsonResponse
//    {
//        try {
//            $sponsor = Sponsor::findOrFail($id);
//
//            if ($sponsor->image) {
//                Storage::disk('public')->delete($sponsor->image);
//            }
//
//            $sponsor->delete();
//
//            return response()->json(['message' => 'Sponsor deleted successfully'], 200);
//        } catch (\Exception $e) {
//            // Handle the exception and return an error response
//            return response()->json(['message' => 'Failed to delete sponsor', 'error' => $e->getMessage()], 400);
//        }
//    }
//}

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Get all sponsors.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllSponsors(): JsonResponse
    {
        $sponsors = Sponsor::all();
        return response()->json($sponsors);
    }

    /**
     * Get a single sponsor.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSponsor($id): JsonResponse
    {
        $sponsor = Sponsor::findOrFail($id);
        return response()->json($sponsor);
    }

    /**
     * Create a new sponsor.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSponsor(Request $request): JsonResponse
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'position' => 'nullable|string|max:255',
                'website_url' => 'nullable|url|max:255',
                'sponsorship_type' => 'nullable|string|in:silver,gold,platinum|max:255',
                'about_company' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sponsors', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Create the sponsor
            $sponsor = Sponsor::create($validatedData);

            return response()->json(['message' => 'Sponsor created successfully', 'sponsor' => $sponsor], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create sponsor', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Update the specified sponsor.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSponsor(Request $request, $id): JsonResponse
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|max:255',
                'phone' => 'nullable|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'position' => 'nullable|string|max:255',
                'website_url' => 'nullable|url|max:255',
                'sponsorship_type' => 'nullable|string|in:silver,gold,platinum|max:255',
                'about_company' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $sponsor = Sponsor::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($sponsor->image) {
                    Storage::disk('public')->delete($sponsor->image);
                }

                // Store the new image
                $imagePath = $request->file('image')->store('sponsors', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Update the sponsor
            $sponsor->update($validatedData);

            return response()->json(['message' => 'Sponsor updated successfully', 'sponsor' => $sponsor], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update sponsor', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Delete the specified sponsor.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSponsor($id): JsonResponse
    {
        try {
            $sponsor = Sponsor::findOrFail($id);

            // Delete the image if it exists
            if ($sponsor->image) {
                Storage::disk('public')->delete($sponsor->image);
            }

            // Delete the sponsor
            $sponsor->delete();

            return response()->json(['message' => 'Sponsor deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete sponsor', 'error' => $e->getMessage()], 400);
        }
    }
}
