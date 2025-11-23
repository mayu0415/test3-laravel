<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //　ユーザー 1名
        $user = User::factory()->create();

        //　weight_logs を 35件（user に紐づける）
        WeightLog::factory()
            ->count(35)
            ->create([
                'user_id' => $user->id,
            ]);

        //　weight_target を 1件（user に紐づける）
        WeightTarget::factory()
            ->create([
                'user_id' => $user->id,
            ]);
    }
}