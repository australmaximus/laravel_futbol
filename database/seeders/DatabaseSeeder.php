<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{Schema,DB};
use DateTime, DateInterval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Insertar datos de Roles
        $roles = [
            ['nombre'=>'Administrador'],
            ['nombre'=>'Coordinador'],
        ];

        foreach ($roles as $rol) {
            DB::table('roles')->insert([
                'nombre' => $rol['nombre'],
                'created_at' => new DateTime('NOW')
            ]);
        }

        // Insertar datos de Usuario
        $usuarios = [
            ['email'=>'admin@gmail.com','password'=>'$2y$10$ixsOI5R8fSm1bdAVmgtWDu4Zku9zdUu7lym78yQxjCz9DoHygkUVC','nombre'=>'Admin','rol_id'=>1,'activo'=>1],
            ['email'=>'coordinador@gmail.com','password'=>'$2y$10$juJn3bxShyh/3V8EBJZXJOzse81ML7NQxmYuUd7jLcqNPfG/MNSHS','nombre'=>'Coord','rol_id'=>2,'activo'=>1],
        ];

        foreach ($usuarios as $usuario) {
            DB::table('usuarios')->insert([
                'email' => $usuario['email'],
                'password' => $usuario['password'],
                'nombre' => $usuario['nombre'],
                'ultimo_login' => new DateTime('NOW'),
                'rol_id' => $usuario['rol_id'],
                'activo' => $usuario['activo'],
                'created_at' => new DateTime('NOW')
            ]);
        }
    }
}
