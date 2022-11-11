<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinic = [
            [
                'name' => 'Ramekh Denist',
                'code' => 'RMRF',
                'description' => 'Dentist Specialty',
                'phone_number' => '',
                'city' => 'Phnom Penh',
                'address' => '',
                'email' => '',
            ],
            [
                'name' => 'Hello Heart',
                'code' => 'HHM',
                'description' => 'Cardiology Specialty',
                'phone_number' => '',
                'city' => 'Phnom Penh',
                'address' => '',
                'email' => '',
            ],
            [
                'name' => 'JE Eye Specialist',
                'code' => 'JKE',
                'description' => 'Eye Specialty',
                'phone_number' => '',
                'city' => 'Phnom Penh',
                'address' => '',
                'email' => '',
            ]
            ];

        foreach ($clinic as $item) {
            Clinic::create($item);
        }
    }
}
