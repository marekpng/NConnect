<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Stage;

class StageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users and stages
        $users = User::all();
        $stages = Stage::all();

        foreach ($users as $user) {
            foreach ($stages as $stage) {
                // Insert into the stage_user pivot table
                DB::table('stage_user')->insert([
                    'user_id' => $user->id,
                    'stage_id' => $stage->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
