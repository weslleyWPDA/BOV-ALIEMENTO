<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\fazenda::create([
            'name' => 'RIO CLARO',
        ]);
        \App\Models\User::create([
            'name' => 'ADMIN',
            'password' => '$2y$10$AQC/PNazy7NgSqMLdMDkOOyIU2qMokbFcAic.j8m6E7bHqQSlOeoG',
            'fazenda_id' => '1',
            'admin' => '1',

        ]);
    }
}
