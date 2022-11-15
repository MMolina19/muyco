<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpholsteredSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('upholstered')->insert([
            'name'  =>  'upholstered.chenille',
            'slug'  =>  'upholstered.chenille-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('upholstered')->insert([
            'name'  =>  'upholstered.corduroy',
            'slug'  =>  'upholstered.corduroy-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('upholstered')->insert([
            'name'  =>  'upholstered.leatherette',
            'slug'  =>  'upholstered.leatherette-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
