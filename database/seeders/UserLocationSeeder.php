<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class UserLocationSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 1; $i < 105; $i++) {
            $faker = \Faker\Factory::create();
            DB::table('user_location')->insert([
                'id'    =>  $i,
                'user_id'    =>  $i,
                'province_id' => $faker->numberBetween(1,24),
                'city'  =>  $faker->city,
                'address'  =>  $faker->address,
                'created_at'    =>  $faker->date(),
                'updated_at'    =>  now(),
            ],);
            //UserLocation::factory()->times(100)->create();
        }
        /*User::all()->each(function($user){
            /*if($user->username=='mmolina' ||
                $user->username=='gmolinari'){
                    DB::table('user_location')->insert([
                        'id'    =>  $user->id,
                        'user_id'    =>  $user->id,
                        'province_id' => 1,
                        'city'  =>  'Benavidez',
                        'address'  =>  'Av. Benavidez 701',
                        'created_at'    =>  now(),
                        'updated_at'    =>  now(),
                    ],);
            }

            if($user->username=='mrozas' ||
                $user->username=='rmolina' ){
                    DB::table('user_location')->insert([
                        'id'    =>  $user->id,
                        'user_id'    =>  $user->id,
                        'province_id' => 1,
                        'city'  =>  'Morón',
                        'address'  =>  'Horacio Julián 527',
                        'created_at'    =>  now(),
                        'updated_at'    =>  now(),
                    ],);
            }
            /*else{
                $faker = \Faker\Factory::create();
                DB::table('user_location')->insert([
                    'id'    =>  $user->id,
                    'user_id'    =>  $user->id,
                    'province_id' => $faker->numberBetween(1,24),
                    'city'  =>  $faker->city,
                    'address'  =>  $faker->address,
                    'created_at'    =>  $faker->date(),
                    'updated_at'    =>  now(),
                ],);

            /*}*/
            UserLocation::factory()->times(100)->create();
        });
    }
}
