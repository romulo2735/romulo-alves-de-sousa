<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state([
                'type' => 'candidate',
            ]),
            'name' => $this->faker->name(),
            'resume' => $this->faker->paragraph,
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
