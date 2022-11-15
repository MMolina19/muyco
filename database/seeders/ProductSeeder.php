<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products')->insert([
            'name'  =>  'products.bedrooms',
            'slug'  =>  'products.bedrooms-slug',
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.desks',
            'slug'  =>  'products.desks-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.specials',
            'slug'  =>  'products.specials-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.dining-chairs',
            'slug'  =>  'products.dining-chairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.sideboards',
            'slug'  =>  'products.sideboards-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.dining-chairs',
            'slug'  =>  'products.dining-chairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.armchairs',
            'slug'  =>  'products.armchairs-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name'  =>  'products.crockery-cabinets',
            'slug'  =>  'crockery-cabinets-slug',
            'active'    =>  1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
