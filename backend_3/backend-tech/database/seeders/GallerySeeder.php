<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Gallery::create([
                'image_link' => 'https://nconnect.sk/images/about/about-logo.jpg',
                'description' => 'Description for image ' . $i,
                'year' => mt_rand(2024, 2025)
            ]);
        }
    }
}
