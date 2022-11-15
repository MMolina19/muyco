<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WoodSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('woods')->insert([
            'name'  =>  'woods.poplar',
            'slug'  =>  'woods.poplar-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.mahogany',
            'slug'  =>  'woods.mahogany-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.cedar',
            'slug'  =>  'woods.cedar-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.frankincense',
            'slug'  =>  'woods.frankincense-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.guatambu',
            'slug'  =>  'woods.guatambu-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.melamine-faplac',
            'slug'  =>  'woods.melamine-faplac-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.paraiso',
            'slug'  =>  'woods.paraiso-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('woods')->insert([
            'name'  =>  'woods.oak',
            'slug'  =>  'woods.oak-slug',
            //cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
