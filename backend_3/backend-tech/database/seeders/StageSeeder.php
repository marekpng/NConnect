<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Stage;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $imageContent = file_get_contents('https://nconnect.sk/images/speakers/uniqua.jpg');
        $imageName = 'stage1.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);

        // Get the path of the saved image
        $imagePath = 'images/' . $imageName;

        // Create stage records
        Stage::create([
            'name' => 'Soft dev stage',
            'date' => '2024-06-01',
            'time' => '09:15 - 09:45',
            'title' => 'Java virtual threads - je reakt9vne programovanie mŕtve ?',
            'description' => 'Predstavenie novinky z JAVY JDK 21. Virtualne thready ponukaju uplne inu dimenziu priepustnosti a su jednoduche na spravu. Prinesie tato novinka revoluciu z pohladu rychlosti java aplikacii? Mozeme sa vzdat reactivnej paradigmy v Jave?',
            'presenter' => 'Patrik Malý ',
            'organization' => 'UNIQA GSC Slovensko',
            'image' => $imagePath, // Save the image path
            'capacity' => 100,
        ]);

        $imageContent = file_get_contents('https://nconnect.sk/images/speakers/muziker.jpg');
         $imageName = 'stage2.jpg';
        Storage::disk('public')->put('images/' . $imageName, $imageContent);
        $imagePath = 'images/' . $imageName;

        Stage::create([
            'name' => 'AI&DATA STAGE',
            'date' => '2024-06-01',
            'time' => '09:15 - 09:45',
            'title' => 'Ako sme v muzikeri postavili miliardový sklad!...Dátový',
            'description' => 'Výzva pripraviť sa na dátovú dobu stála aj pred nami v Muzikeri. Ako sme sa s touto výzvou popasovali, čo všetko to znamenalo pre nás, aké všetky prekážky sme museli prekonať, aké všetky veci nás vyfackali vám skusime rozpovedať v našom príbehu. Aby to nebola iba "rozprávka", povieme si viac do detailu o databázovej technologii Clickhouse, ktorá nám veľa z tých problémov pomohla poriešiť. A iné zase priniesla',
            'presenter' => 'Lukáš Kozelnický ',
            'organization' => 'Muziker',
            'image' => $imagePath, // Save the image path
            'capacity' => 200,
        ]);
    }
}
