<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('rooms')->insert([
            'name'  =>  'rooms.bedroom',
            'slug'  =>  'rooms.bedroom-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('rooms')->insert([
            'name'  =>  'rooms.living-room',
            'slug'  =>  'rooms.living-room-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('rooms')->insert([
            'name'  =>  'rooms.dining-and-kitchen',
            'slug'  =>  'rooms.dining-and-kitchen-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('rooms')->insert([
            'name'  =>  'rooms.office',
            'slug'  =>  'rooms.office-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('rooms')->insert([
            'name'  =>  'rooms.accesories',
            'slug'  =>  'rooms.accesories-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('rooms')->insert([
            'name'  =>  'rooms.kids',
            'slug'  =>  'rooms.kids-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
