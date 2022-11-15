<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = Role::all();

        User::all()->each(function($user) use ($roles) {
            if($user->username=='mmolina' || $user->username=='gmolinari' ||
                $user->username=='mrozas' || $user->username=='rmolina') {
                    $user->roles()->attach(1);
            }
            else {
                $user->roles()->attach(
                    $roles->random(1)->pluck('id')
                );
            }
        });

    }
}
