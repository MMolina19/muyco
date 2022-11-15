<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(NavbarSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(CollectionProductSeeder::class);
        $this->call(WoodSeeder::class);
        $this->call(UpholsteredSeeder::class);
        $this->call(DesignTypeSeeder::class);
        $this->call(RoomSeeder::class);

    }
}
