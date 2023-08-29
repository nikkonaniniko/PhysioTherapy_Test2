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
        \App\Models\Staffs::factory(50)->create();
        \App\Models\User::factory()->create();
        \App\Models\Patients::factory(50)->create();
        \App\Models\Prescriptions::factory(60)->create();
        \App\Models\Equipments::factory(20)->create();
        \App\Models\Supplies::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
