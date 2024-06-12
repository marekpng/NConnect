<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageContent = file_get_contents('https://nconnect.sk/images/sponsor/Gymbeam_logo_270x160.png');
        $imageName = 'sponsor1.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);

        // Get the path of the saved image
        $imagePath = 'images/' . $imageName;

        // Create sponsor records
        Sponsor::create([
            'name' => 'Sponsor One',
            'email' => 'sponsor1@example.com',
            'image' => $imagePath, // Save the image path
            'company_name' => 'Company One',
            'position' => 'CEO',
            'website_url' => 'https://gymbeam.sk/',
            'sponsorship_type' => 'gold',
            'about_company' => 'Company One is a leading company in its industry.',
        ]);

        $imageContent = file_get_contents('https://nconnect.sk/images/sponsor/pps.png');
        $imageName = 'sponsor2.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);
        $imagePath = 'images/' . $imageName;

        Sponsor::create([
            'name' => 'Sponsor Two',
            'email' => 'sponsor2@example.com',
            'image' => $imagePath, // Save the image path
            'company_name' => 'Company Two',
            'position' => 'CTO',
            'website_url' => 'https://www.powerplay.studio/',
            'sponsorship_type' => 'silver',
            'about_company' => 'Company Two is a leading company in its industry.',
        ]);
    }
}
