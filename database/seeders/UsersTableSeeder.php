<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2022-09-03 10:00:40',
                'ktp'                => '',
                'visa'               => '',
                'bst_ccm'            => '',
                'passport'           => '',
                'country'            => '',
                'state'              => '',
                'city'               => '',
                'address'            => '',
                'verification_token' => '',
                'two_factor_code'    => '',
                'age'                => '',
                'contact_no'         => '',
                'first_name'         => '',
                'last_name'          => '',
                'nationality'        => '',
                'home_airport'       => '',
                'post_code'          => '',
                'birth_place'        => '',
                'department_applied' => '',
            ],
        ];

        User::insert($users);
    }
}
