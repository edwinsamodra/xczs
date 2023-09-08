<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 'logo' => Str::random(20) . '.png',
        return [
            'kode_user' => 'A00001',
            'kepala_cabang' => $this->faker->streetName(),
            'logo' => 'default-logo.png',
            'alamat' => $this->faker->streetAddress(),
            'id_dc_propinsi' => 6,
            'id_dc_kota' => 43,
            'id_dc_kecamatan' => 464,
            'id_dc_kelurahan' => 5394,
            'contact_person_1' => $this->faker->name(),
            'contact_person_2' => $this->faker->name()
        ];
    }
}
