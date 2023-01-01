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
                'name' => 'Jabal Nur',
                'email' => 'Jabalnoer@gmail.com',
            ],
            [
                'name' => 'Test Name',
                'email' => 'test@gmail.com',
            ],
        ];

        foreach ($users as $user) {
            User::factory()
            ->create([
                'name'  => $user['name'],
                'email' => $user['email'],
            ]);
        }
    }
}
