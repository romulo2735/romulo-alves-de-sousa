<?php

namespace Tests\Feature;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class DatabaseSeedTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_is_seeded_correctly(): void
    {
        $this->seed();

        $this->assertEquals(15, User::query()->count());
        $this->assertEquals(10, Candidate::query()->count());
        $this->assertGreaterThanOrEqual(1, Vacancy::query()->count());

        $candidate = Candidate::query()->first();
        $this->assertGreaterThanOrEqual(1, $candidate->jobs()->count());
    }
}
