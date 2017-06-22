<?php

use Illuminate\Database\Seeder;

class UniversidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
        	'nombre_u' =>'Universidad de Chile',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Pontificia Universidad Católica de Chile',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Concepción',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Pontificia Universidad Católica de Valparaíso',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Técnica Federico Santa María',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Santiago de Chile',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Austral de Chile',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Católica del Norte',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Valparaíso',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Metropolitana de Ciencias de la Educación',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Tecnológica Metropolitana',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Tarapacá',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Arturo Prat',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Antofagasta',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de La Serena',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Playa Ancha',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Atacama',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad del Bío Bío',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de la Frontera',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de los Lagos',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Magallanes',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Talca',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Católica del Maule',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Católica de la Santísima Concepción',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad Católica de Temuco',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de O Higgins',
        ]);
        DB::table('universities')->insert([
            'nombre_u' =>'Universidad de Aysén',
        ]);
    }
}
