<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('usuarios')->insert([
        	'rut' =>'11111',
            'rol' => 'Administrador',
            'usuario' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
