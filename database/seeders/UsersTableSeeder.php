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
                'verified_at'        => '2022-08-28 18:21:34',
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
            ],
        ];

        User::insert($users);
    }
}
