<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('provinces')->insert(
            ['name' => 'Buenos Aires',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Capital Federal',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Catamarca',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Chaco',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Chubut',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Córdoba',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Corrientes',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Entre Ríos',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Formosa',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Jujuy',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'La Pampa',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'La Rioja',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Mendoza',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Misiones',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Neuquén',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Río Negro',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Salta',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'San Juan',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'San Luis',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Santa Cruz',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Santa Fe',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Santiago del Estero',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Tierra del Fuego',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        DB::table('provinces')->insert(
            ['name' => 'Tucumán',
            'created_at'    =>  now(),
            'updated_at'    =>  now(),],);
        //Province::create();
    }
}
