<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => env('APP_USERNAME'),
            'email' => 'jorgearagon32@gmail.com',
            'password' => bcrypt(env('APP_PASSWORD')),
            'lastName' => 'BIO',
            'birthdate' => '21-06-1990',
            'location' => 'Granada',
            'address' => 'Almuñecar',
            'address_info' => 'Avd. Costa del sol Nº 24, Portal 2, Piso 4B',
            'mobile_phone' => '664457839',
            'privacy_policy' => true,
            'newsletters' => false,
            'status' => true,
            'cp' => '18690'
        ]);

        $user->save();


        $role_id = Role::where('name', 'admin')->first();
        $role = new RoleUser([
            'user_id' => $user->id,
            'role_id' => $role_id->id
        ]);

        $role->save();
    }
}
