<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Where('email', 'superadmin@mail.com')->first();

        if(is_null($user))
        {
            $user = User::create([
                'name'      => 'Raul Rzayev',
                'email'     => 'superadmin@mail.com',
                'mobile'    => '01689201370',
                'password'  => bcrypt('raul.rzayev'),
                'status'    => 1
            ]);

            $user->assignRole('Admin');
        }

    }
}
