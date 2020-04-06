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

        //-------Creacion de Usuario con rol de cliente ---------------------------
        $editor = User::create([
            'name' => 'cliente',
            'email'=> 'cliente@gmail.com',
            'password'=>bcrypt(12345678)
        ]);

        $editor->assignRole('cliente');


        //-------Creacion de Usuario con rol de master ---------------------------
        $master = User::create([
            'name' => 'master',
            'email'=> 'master@gmail.com',
            'password'=>bcrypt(12345678)
        ]);

        $master->assignRole('master');
    }
}
