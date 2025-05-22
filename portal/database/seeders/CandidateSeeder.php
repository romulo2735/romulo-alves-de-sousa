<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidateUsers = User::query()->where('type', 'candidate')->get();

        foreach ($candidateUsers as $user) {
            Candidate::factory()->create(['user_id' => $user->id]);
        }
    }
}
