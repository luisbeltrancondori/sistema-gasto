<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'images/'. $this->faker->image('storage/app/public/images',640,480, null, false),
            'imageable_id' => $this->faker->randomElement([1,2,3,4]),
            'imageable_type' => $this->faker->randomElement(['App\Models\User','App\Models\Movement'])
        ];
    }
}
