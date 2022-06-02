<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->randomElement(['Front-end', 'Back-end','Full-stack','Mobile']),
            'salary' => $this->faker->randomElement(['10', '20', '30']),
            'description' => $this->faker->paragraph,
            'duration'=> $this->faker->randomElement(['1','2','3','4','5','6','7','8','9','10']), 
            'user_id' => random_int(1, User::count()),
        ];
    }
}
