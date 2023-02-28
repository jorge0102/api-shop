<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ExcludedVegetables;
use App\Models\ExcludedFruits;

class ExcludedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excluded_vegetables = new ExcludedVegetables();
        $excluded_vegetables->name = 'cucumber';
        $excluded_vegetables->save();

        $excluded_vegetables = new ExcludedVegetables();
        $excluded_vegetables->name = 'onion';
        $excluded_vegetables->save();

        $excluded_fruits = new ExcludedFruits();
        $excluded_fruits->name = 'apple';
        $excluded_fruits->save();

        $excluded_fruits = new ExcludedFruits();
        $excluded_fruits->name = 'mango';
        $excluded_fruits->save();
    }
}
