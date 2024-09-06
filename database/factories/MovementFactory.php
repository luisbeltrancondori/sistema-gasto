<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Categorie;
use App\Models\Coin;
use App\Models\Movementtype;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'detail' => $this->faker->text(),
            'date' => $this->faker->dateTime(),
            'user_id' => User::all()->random()->id,
            'account_id' => Account::all()->random()->id,
            'categorie_id' => Categorie::all()->random()->id,
            'movementtype_id' => Movementtype::all()->random()->id,
            'status' => $this->faker->randomElement(['Activo', 'Desactivado']),
            'coin_id' => Coin::all()->random()->id,
            'amount' => $this->faker->numberBetween(1, 1000),


        ];
    }
}
