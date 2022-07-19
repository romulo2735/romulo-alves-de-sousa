<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
        $roleCandidato = \App\Models\Role::factory([
            'name' => 'Candidato'
        ])
            ->has(\App\Models\User::factory()->count(3))
            ->create();

        $roleRecrutador = \App\Models\Role::factory([
            'name' => 'Recrutador'
        ])
            ->has(\App\Models\User::factory()->count(3))
            ->create();
    


    }
}
