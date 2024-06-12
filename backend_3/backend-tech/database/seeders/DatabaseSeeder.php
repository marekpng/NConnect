<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SponsorSeeder::class,
            AdminSeeder::class,
            StageSeeder::class,
            SpeakerSeeder::class,
            AboutUsSeeder::class,
            CustomSiteSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
