<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kg;

class KgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kg = new Kg();
        $kg->kg = 3;
        $kg->save();

        $kg = new Kg();
        $kg->kg = 5;
        $kg->save();
    }
}
