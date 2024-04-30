<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;

class SponsorsController extends Controller
{
    public function getAllSponsors()
    {
//         Retrieve all sponsors from the database
        $sponsors = Sponsor::all();

        // Return sponsors as JSON response
        return response()->json($sponsors);

    }

}
