<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Task;
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

        $admin = User::factory()->create([
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

        //Creamos los roles.
        $roles = ['Administrador', 'Profesor', 'Alumno'];

        foreach($roles as $r){
            Role::create([
                'name' => $r
            ]);
        }

        //Agregamos roles.
        $admin->roles()->sync( [1, 2] );

        //Lo hizo deepseek.
        $users->each(function ($user) {
            $roles = rand(0, 100) < 30 ? [2, 3] : [rand(2, 3)];
            $user->roles()->sync($roles);
        });

        //Tareas aleatorioas.
        Task::factory(10)->create();

    }
}
