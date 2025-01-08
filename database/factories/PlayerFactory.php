<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'username' => $this->faker->userName,
            'year_level' => $this->faker->numberBetween(1, 4),
            'section' => $this->faker->word, 
        ];
    }
}
