<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Claim>
 */
class ClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id' => $this->faker->numberBetween(1, 100),
            'kode_user' => 'A00001',
            'tanggal_masuk' => $this->faker->date(),
            'status_proses' => $this->faker->randomElement([1,2,3,4]),
        ];
    }
}
