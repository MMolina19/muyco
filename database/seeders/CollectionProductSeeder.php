<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Schema;

class CollectionProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //if (!Schema::hasTable('collection_product')) {
            DB::table('collection_product')->insert([
                'collection_id'  =>  1,
                'product_id'  =>  1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        //}
    }
}
