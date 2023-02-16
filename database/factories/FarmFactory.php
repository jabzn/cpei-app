<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $typeLivestock = ['Layer', 'Broiler', 'Swine', 'Duck', 'Quail'];
        $regional      = ['Sulawesi', 'Kalimantan'];
        $subregional   = ['SulSel', 'KalBar', 'KalTim', 'KalSel', 'KalTeng'];

        return [
            'user_id' => User::factory(),
            'name' => fake()->company(),
            'owner' => fake()->name(),
            'type_livestock' => fake()->randomElement($typeLivestock),
            'regional' => fake()->randomElement($regional),
            'subregional' => fake()->randomElement($subregional),
        ];
    }
}
