<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomSite;

class CustomSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomSite::create([
            'name' => 'Test Site',
            'myFile' => '<h1>Welcome to the Test Site</h1><p>This is a test content.</p>',
            'path' => 'test-site',
        ]);

        CustomSite::create([
            'name' => 'Another Test Site',
            'myFile' => '<h1>Welcome to Another Test Site</h1><p>This is another test content.</p>',
            'path' => 'another-test-site',
        ]);
    }
}
