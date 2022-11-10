<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Dentistry',
                'code' => 'DNT',
                'description' => 'Dentistry',
            ],
            [
                'name' => 'Cardiology',
                'code' => 'CDG',
                'description' => 'Cardiology',
            ],
            [
                'name' => 'Diabetic',
                'description' => 'Diabetic',
                'code' => 'DBT',
            ]
            ];

        foreach ($services as $item) {
            Service::create($item);
        }
    }
}
