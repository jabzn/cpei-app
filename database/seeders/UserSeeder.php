<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'name'  => 'Jabal Nur',
                'email' => 'Jabalnoer@gmail.com',
                'role'  => 'admin',
            ],
            [
                'name'  => 'Jusman',
                'email' => 'jusman@gmail.com',
                'role'  => 'ts/ppl',
            ],
            [
                'name'  => 'Muhammad Lutfi',
                'email' => 'lutfi@gmail.com',
                'role'  => 'ts/ppl',
            ],

        ];

        foreach ($users as $user) {
            User::factory()->create([
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role'],
            ]);
        }
    }
}
