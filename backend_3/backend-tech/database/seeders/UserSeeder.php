<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            User::create([
                'meno' => "Jano_" . mt_rand(1, 500),
                'email' => "jano." . mt_rand(1, 500) . "@gmail.com"
            ]);
        }
    }
}
