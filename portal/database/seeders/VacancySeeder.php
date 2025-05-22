<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recruiters = User::query()->where('type', 'recruiter')->get();

        Vacancy::factory()->count(50)->make()->each(function ($job) use ($recruiters) {
            $job->user_id = $recruiters->random()->id;
            $job->save();
        });
    }
}
