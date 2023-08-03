<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\It_crew::factory(100)->create();
        \App\Models\It_document::factory(100)->create();
        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin12345'),
        ]);
    }
}
