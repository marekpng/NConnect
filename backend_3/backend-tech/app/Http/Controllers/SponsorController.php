<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SponsorController extends Controller
{

    public function getAllSponsors()
    {
        $sponsors = Sponsor::all();
        return response()->json($sponsors);
    }

//    public function createSponsor(Request $request): JsonResponse
//    {
//        $name = $request->input('name');
//        $email = $request->input('email');
//        $phone = $request->input('phone');
//        $companyName = $request->input('company_name');
//        $position = $request->input('position');
//        $websiteUrl = $request->input('website_url');
//        $sponsorshipType = $request->input('sponsorship_type');
//        $aboutCompany = $request->input('about_company');
//        $image = $request->input('image');
//
//        // Validate input data
//        $validatedData = $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|email',
//            'phone' => 'nullable|string',
//            'company_name' => 'nullable|string',
//            'position' => 'nullable|string',
//            'website_url' => 'nullable|url',
//            'sponsorship_type' => 'nullable|string|in:silver,gold,platinum',
//            'about_company' => 'nullable|string',
//            'image' => 'nullable|string',
//        ]);
//
//        // Create the sponsor
//        $sponsor = Sponsor::create($validatedData);
////
//        return response()->json(['message' => 'Sponsor created successfully', 'sponsor' => $sponsor], 201);
//    }
    public function createSponsor(Request $request): JsonResponse
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'nullable|string',
                'company_name' => 'nullable|string',
                'position' => 'nullable|string',
                'website_url' => 'nullable|url',
                'sponsorship_type' => 'nullable|string|in:silver,gold,platinum',
                'about_company' => 'nullable|string',
                'image' => 'nullable|string',
            ]);

            // Create the sponsor
            $sponsor = Sponsor::create($validatedData);

            return response()->json(['message' => 'Sponsor created successfully', 'sponsor' => $sponsor], 201);
        } catch (\Exception $e) {
            // Handle the exception and return an error response
            return response()->json(['message' => 'Failed to create sponsor', 'error' => $e->getMessage()], 400);
        }
    }
}
