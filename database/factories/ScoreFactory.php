<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    protected $model = Score::class;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => Player::inRandomOrder()->first()->id, 
            'overall_score' => $this->faker->numberBetween(1, 100),
            'hangman_score' => $this->faker->numberBetween(1, 100),
            'text_twister_score' => $this->faker->numberBetween(1, 100),
            'interactive_novel_score' => $this->faker->numberBetween(1, 100),
        ];
    }
}
