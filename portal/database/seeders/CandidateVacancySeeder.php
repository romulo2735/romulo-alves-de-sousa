<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Vacancy::query()->pluck('id');

        Candidate::all()->each(function ($candidate) use ($jobs) {
            $candidate->vacancies()->attach(
                $jobs->random(rand(1, 5))->toArray()
            );
        });
    }
}
