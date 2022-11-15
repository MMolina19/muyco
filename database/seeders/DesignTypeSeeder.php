<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('designs_types')->insert([
            'name'  =>  'designs_types.traditional',
            'slug'  =>  'designs_types.traditional-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('designs_types')->insert([
            'name'  =>  'designs_types.contemporary',
            'slug'  =>  'designs_types.contemporary-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('designs_types')->insert([
            'name'  =>  'designs_types.classic',
            'slug'  =>  'designs_types.classic-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
        DB::table('designs_types')->insert([
            'name'  =>  'designs_types.modern',
            'slug'  =>  'designs_types.modern-slug',
            //'cover'  =>  null,
            //'cover_path'  =>  null,
            //'cover_url'  =>  null,
            'active'    =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
