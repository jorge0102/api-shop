<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BoxType;

class BoxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new BoxType();
        $type->name = 'vegetables';
        $type->save();

        $type = new BoxType();
        $type->name = 'fruits';
        $type->save();

        $type = new BoxType();
        $type->name = 'mix';
        $type->save();
    }
}
