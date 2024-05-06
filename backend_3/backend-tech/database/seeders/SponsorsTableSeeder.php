<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the sponsors table
        DB::table('sponsors')->insert([
            'name' => 'Sample Sponsor 1',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'job' => 'Software Engineer',
            'socialmedia' => 'https://example.com/sample-sponsor',
            'image' => 'sample-sponsor.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more seed data as needed
    }
}
