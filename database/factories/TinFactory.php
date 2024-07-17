<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tin>
 */
class TinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loai_tin_id' => rand(2, 5),
            'tieuDe' => fake()->text(20),
            'anh' => 'https://cdnmedia.baotintuc.vn/Upload/rGkvwNpj74Z1EcpzQ6ltA/files/2020/09/tin-tuc-15920.jpg',
            'noiDung' => fake()->text(100),
            'luotXem' => fake()->numberBetween(1, 100),
            'ngayDang' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
