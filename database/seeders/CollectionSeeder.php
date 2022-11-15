<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Schema;

class CollectionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //if (!Schema::hasTable('collections')) {
            DB::table('collections')->insert([
                'name'  =>  'Colección 01',
                'slug'  =>  'coleccion-01',
                'description'  =>  'Coleccion 01 de Dormitorios. En Madera Paraíso. Lustre color Paraíso Natural. Con dos mesitas de luz. Cama para colchón de (1.60 x 1.90)mts',
                'amount'    =>  89000,
                'cover'    =>  null,
                'cover_path'    =>  null,
                'cover_url'    =>  null,
                'active'    =>  1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        //}
    }
}
