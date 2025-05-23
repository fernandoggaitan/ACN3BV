<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        User::factory()->create([
            'name' => 'Fernando',
            'email' => 'fernando.gaitan@davinci.edu.ar',
            'password' => Hash::make('1234')
        ]);

        //Creamos varios usuarios aleatorios.
        $users = User::factory(9)->create();

        //Cursos aleatorios.
        Curso::factory(500)->create();

        //Creamos 500 comentarios aleatorios.
        Comment::factory(500)->create();

    }
}
