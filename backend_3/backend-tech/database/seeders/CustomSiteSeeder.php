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
            'name' => 'Ochrana osobných údajov',
            'myFile' => '<h1>Ochrana osobnych udajov !</h1><p>toto je content ochrany osobnych udajov</p>',
             'path' => 'gdpr'
        ]);

    }
}
