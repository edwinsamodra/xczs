<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrProducts = [
            'Life Plan 100', 
            'Q Life 100', 
            'Whole Life',
            'TelePro',
            'EduPlan',
            'EduPlus',
            'SequislinQ',
            'SmartLink',
            'SmartLife'
        ];

        return [
            'nama_perusahaan' => $this->faker->company(),
            'nama_cabang' => $this->faker->streetName(),
            'periode' => $this->faker->randomElement([2021, 2022]),
            'alamat' => $this->faker->streetAddress(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'nama_direktur' => $this->faker->name(),
            'nama_contact_person' => $this->faker->name(),
            'telp_contact_person' => $this->faker->phoneNumber(),
            'nama_produk' => $this->faker->randomElement($arrProducts),            
            'id_dc_propinsi' => 6,
            'id_dc_kota' => 43,
            'id_dc_kecamatan' => 464,
            'id_dc_kelurahan' => 5394
        ];
    }
}
