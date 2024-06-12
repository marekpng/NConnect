<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Download the image and save it to the storage
        $imageContent = file_get_contents('https://nconnect.sk/images/speakers/Gymbeam.jpg');
        $imageName = 'speaker1.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);

        // Get the path of the saved image
        $imagePath = 'images/' . $imageName;

        // Create speaker records
        Speaker::create([
            'name' => 'Dalibor Cicman',
            'company_name' => 'GymBeam',
            'image' => $imagePath, // Save the image path
            'short_description' => 'Zakladateľ a CEO GymBeam, od roku 2014 transformoval trh so športovou výživou na e-commerce platformu pôsobiacu v 16 krajinách s ročnými tržbami presahujúcimi 100 miliónov Eur. ',
            'long_description' => 'Zakladateľ a CEO GymBeam, od roku 2014 transformoval trh so športovou výživou na e-commerce platformu pôsobiacu v 16 krajinách s ročnými tržbami presahujúcimi 100 miliónov Eur.

Ako nositeľ ocenení Forbes "30 pod 30" a YT Podnikateľ roka 2024, Dalibor presadzuje význam dátovo riadeného prístupu, inovačnej kultúry a tímovej spolupráce pri budovaní značky.',
            'social_media_links' => [
                "https://twitter.com/daliborcicman",
                "https://linkedin.com/in/daliborcicman",
                "https://facebook.com/daliborcicman",
                "https://instagram.com/daliborcicman",
                "https://youtube.com/daliborcicman"
            ]
        ]);

        // Repeat the process for the second speaker
        $imageContent = file_get_contents('https://nconnect.sk/images/speakers/muziker.jpg');

        $imageName = 'speaker2.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);
        $imagePath = 'images/' . $imageName;

        Speaker::create([
            'name' => 'Lukáš Kozelnický',
            'company_name' => 'Muziker',
            'image' => $imagePath, // Save the image path
            'short_description' => 'Lukáš pôsobí v Muzikeri od začiatku roku 2022 a teda od začiatku budovania nového dátového skladu. Deväť rokov sa venoval sieťam a DevOps a od roku 2020 sa viac venuje dátovej vede. ',
            'long_description' => 'Lukáš pôsobí v Muzikeri od začiatku roku 2022 a teda od začiatku budovania nového dátového skladu. Deväť rokov sa venoval sieťam a DevOps a od roku 2020 sa viac venuje dátovej vede. Má skúsenosti s technológiami ako Python, Airflow, DBT či ClickHouse.',
            'social_media_links' => [
                "https://twitter.com/lukaskozelnicky",
                "https://linkedin.com/in/lukaskozelnicky",
                "https://facebook.com/lukaskozelnicky",
                "https://instagram.com/lukaskozelnicky",
                "https://youtube.com/lukaskozelnicky"
            ]
        ]);
    }
}
