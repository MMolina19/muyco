<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::all()->each(function($user){
            DB::table('user_social_media')->insert([
                'id'    =>  $user->id,
                'user_id'    =>  $user->id,
                'instagram' => null,
                'facebook'  =>  null,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],);
        });
    }
}
