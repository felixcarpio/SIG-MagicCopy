<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // usuario con el rol administrador
        $admin = User::create([
            'username'=>'admin',
            'name'=>'nombre1 nombre2',
            'surname'=>'apellido1 apellido2',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        $admin->assignRole('administrador');
    }
}
