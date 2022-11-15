<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('navbar')->insert(
            [   'id'            =>  1,
                'name'          =>  'home.title',
                //'url'           =>  'urls.home-request',
                'slug'          =>  'home',
                'navigation'    =>  'navigation.home',
                'route'         =>  'urls.home',
                'active'        =>  1,
                'image_type'    =>  'img',
                'image_src'     =>  'images/logos/muyco_logo_v1_180x180_04.png',
                'image_class'   =>  'small-logo',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  2,
                'name'          =>  'users.title',
                //'url'           =>  'urls.users-request',
                'slug'          =>  'users',
                'navigation'    =>  'navigation.users',
                'route'         =>  'urls.users',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-person-circle',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  3,
                'name'          =>  'dashboard.title',
                //'url'           =>  'urls.dashboard-request',
                'slug'          =>  'dashboard',
                'navigation'    =>  'navigation.dashboard',
                'route'         =>  'urls.dashboard',
                'active'        =>  0,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-speedometer2',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  4,
                'name'          =>  'products.title',
                //'url'           =>  'urls.products-request',
                'slug'          =>  'products',
                'navigation'    =>  'navigation.products',
                'route'         =>  'urls.products',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  5,
                'name'          =>  'products_types.title',
                //'url'           =>  'urls.products_types-request',
                'slug'          =>  'products_types',
                'navigation'    =>  'navigation.products-types',
                'route'         =>  'urls.products_types',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  6,
                'name'          =>  'collections.title',
                //'url'           =>  'urls.collections-request',
                'slug'          =>  'collections',
                'navigation'    =>  'navigation.collections',
                'route'         =>  'urls.collections',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  7,
                'name'          =>  'orders.title',
                //'url'           =>  'urls.orders-request',
                'slug'          =>  'orders',
                'navigation'    =>  'navigation.orders',
                'route'         =>  'urls.orders',
                'active'        =>  0,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-table',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        /*DB::table('navbar')->insert(
            [   'id'            =>  8,
                'name'          =>  'images.title',
                //'url'           =>  'urls.images-request',
                'slug'          =>  'images',
                'navigation'    =>  'navigation.images',
                'route'         =>  'urls.images',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-images',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );*/
        DB::table('navbar')->insert(
            [   'id'            =>  8,
                'name'          =>  'woods.title',
                //'url'           =>  'urls.woods-request',
                'slug'          =>  'woods',
                'navigation'    =>  'navigation.woods',
                'route'         =>  'urls.woods',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  9,
                'name'          =>  'upholstered.title',
                //'url'           =>  'urls.upholstered-request',
                'slug'          =>  'upholstered',
                'navigation'    =>  'navigation.upholstered',
                'route'         =>  'urls.upholstered',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  10,
                'name'          =>  'designs_types.title',
                //'url'           =>  'urls.designs_types-request',
                'slug'          =>  'designs_types',
                'navigation'    =>  'navigation.designs-types',
                'route'         =>  'urls.designs_types',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
        DB::table('navbar')->insert(
            [   'id'            =>  11,
                'name'          =>  'rooms.title',
                //'url'           =>  'urls.rooms-request',
                'slug'          =>  'rooms',
                'navigation'    =>  'navigation.rooms',
                'route'         =>  'urls.rooms',
                'active'        =>  1,
                'image_type'    =>  'i',
                'image_src'     =>  'null',
                'image_class'   =>  'fs-5 bi-grid',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        );
    }
}
