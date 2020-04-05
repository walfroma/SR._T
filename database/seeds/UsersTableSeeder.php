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

        //-------Creacion de Usuario con rol de editor ---------------------------
        $editor = User::create([
            'name' => 'editor',
            'email'=> 'editor@gmail.com',
            'password'=>bcrypt(12345678)
        ]);

        $editor->assignRole('editor');

        //-------Creacion de Usuario con rol de moderador ---------------------------
        $moderador = User::create([
            'name' => 'moderador',
            'email'=> 'moderador@gmail.com',
            'password'=>bcrypt(12345678)
        ]);

        $moderador->assignRole('moderador');

        //-------Creacion de Usuario con rol de master ---------------------------
        $master = User::create([
            'name' => 'master',
            'email'=> 'master@gmail.com',
            'password'=>bcrypt(12345678)
        ]);

        $master->assignRole('master');
    }
}
