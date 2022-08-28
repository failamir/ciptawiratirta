<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2022-08-26 20:47:42',
                'updated_at' => '2022-08-26 20:47:42',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2022-08-26 20:47:42',
                'updated_at' => '2022-08-26 20:47:42',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2022-08-26 20:47:42',
                'updated_at' => '2022-08-26 20:47:42',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
