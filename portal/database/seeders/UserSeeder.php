<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->state(['type' => 'recruiter'])->create();
        User::factory()->count(100)->state(['type' => 'candidate'])->create();
    }
}
