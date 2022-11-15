<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products_types')->insert([
            'name'  =>  'products_types.bedrooms',
            'slug'  =>  'products_types.bedrooms-slug',
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.desks',
            'slug'  =>  'products_types.desks-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.specials',
            'slug'  =>  'products_types.specials-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.dining-chairs',
            'slug'  =>  'products_types.dining-chairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.sideboards',
            'slug'  =>  'products_types.sideboards-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.dining-chairs',
            'slug'  =>  'products_types.dining-chairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.armchairs',
            'slug'  =>  'products_types.armchairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products_types')->insert([
            'name'  =>  'products_types.crockery-cabinets',
            'slug'  =>  'products_types.crockery-cabinets-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
