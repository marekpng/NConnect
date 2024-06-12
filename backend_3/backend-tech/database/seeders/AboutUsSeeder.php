<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            AboutUs::create([
                'image_link' => 'https://nconnect.sk/images/testimonial/1.jpg',
                'quote' => 'Oceňujem, že vzniká nová iniciativá spojiť časť akademickej obce v podobe študentov a súkromný sektor v našom regióne',
            ]);
        AboutUs::create([
            'image_link' => 'https://nconnect.sk/images/testimonial/2.jpg',
            'quote' => 'Je vždy dobré, keď sa aktivizuje IT komunita aj v oblastaich mimo Bratislavi.',
        ]);
    }
}
