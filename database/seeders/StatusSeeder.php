<?php

namespace Database\Seeders;

use App\Models\Status;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            [
                'name' => 'Request',
                'code' => 'RQS',
                'description' => 'Requesting'
            ],
            [
                'name' => 'Accepted',
                'code' => 'ACP',
                'description' => 'Request Accepted'
            ],
            [
                'name' => 'Rejected',
                'code' => 'RJT',
                'description' => 'Request Rejected'
            ]
            ];

        foreach ($specialties as $item) {
            Status::create($item);
        }
    }
}
