<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();

        Farm::factory()
            ->count(10)
            ->create([
                'user_id' => function () use ($users) {
                    return $users->where('role', 'ts/ppl')->random()->id;
                }
            ]);
    }
}
