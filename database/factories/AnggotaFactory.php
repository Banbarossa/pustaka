<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create();
        $random_number = $faker->numberBetween(1000000000, 9999999999);

        return [
            'nisn' => $random_number,
            'name' => fake()->name(),
            'pob' => fake()->city(),
            'dob' => fake()->date(),
            'mulai_keanggotaan' => fake()->date(),
            'role' => fake()->randomElement(['Santri', 'Pegawai']),
        ];
    }
}
