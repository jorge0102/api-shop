<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KgSeeder::class);
        $this->call(BoxTypeSeeder::class);
        $this->call(ExcludedSeeder::class);
        $this->call(FrequencySeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserAdminSeeder::class);
    }
}
