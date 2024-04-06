<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create(['name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
        'level' => 'admin'
        ]);

        User::create(['name' => 'Test User',
        'email' => 'not@example.com',
        'password' => bcrypt('password'),
        'level' => 'editor'

        ]);

        User::create(['name' => 'Test User',
        'email' => 'yes@example.com',
        'password' => bcrypt('password'),
        'level' => 'pengguna'
        ]);
    }
}
