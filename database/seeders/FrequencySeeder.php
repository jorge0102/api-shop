<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Frequency;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frequency = new Frequency();
        $frequency->frecuency = 'weekly';
        $frequency->save();

        $frequency = new Frequency();
        $frequency->frecuency = 'monthly';
        $frequency->save();
    }
}
