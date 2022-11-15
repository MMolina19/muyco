<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert(
            [
                'id'    =>  1,
                'name' => 'Maximiliano Molina',
                'username'  =>  'mmolina',
                'email'  =>  'molinarozas@gmail.com',
                'email_verified_at' =>  now(),
                'password'  =>  hash::make('juanito01'),
                'active'    =>  1,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],);
        DB::table('users')->insert([
                'id'    =>  2,
                'name' => 'Gisele Molinari',
                'username'  =>  'gmolinari',
                'email'  =>  'gisele.molinari@gmail.com',
                'email_verified_at' =>  now(),
                'password'  =>  hash::make('juanito02'),
                'active'    =>  1,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],);
        DB::table('users')->insert([
                'id'    =>  3,
                'name' => 'Matilde Rozas',
                'username'  =>  'mrozas',
                'email'  =>  'matilderozas49@gmail.com',
                'email_verified_at' =>  now(),
                'password'  =>  hash::make('juanito02'),
                'active'    =>  1,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],);
        DB::table('users')->insert([
                'id'    =>  4,
                'name' => 'Ricardo Molina',
                'username'  =>  'rmolina',
                'email'  =>  'molinaricardoleon@gmail.com',
                'email_verified_at' =>  now(),
                'password'  =>  hash::make('juanito02'),
                'active'    =>  1,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],);

        User::factory()->times(100)->create();
    }
}
