<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrKodeUser = [
            'P00001',
            'A00001',
            'K00001',
            'R00001'
        ];

        $arrCompanyId = [
            500,
            501,
            502,
            503,
            504
        ];

        return [
            'kode_user' => 'P00001',
            'company_id' => 0,
            'nomor_polis' => $this->faker->md5(),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->streetAddress(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => 'L'
        ];
    }


    /**
     * Generate peserta perusahaan
     *
     * @return static
     */
    public function pesertaAsuransiPerusahaan() {
        return $this->state(function (array $attributes) {
            return [
                'kode_user' => 'A00001',
                'company_id' => 504
            ];
        });
    }


    /**
     * Generate peserta umum
     *
     * @return static
     */
    public function pesertaAsuransiUmum() {
        return $this->state(function (array $attributes) {
            return [
                'kode_user' => 'A00001',
                'company_id' => 0
            ];
        });
    }
}
