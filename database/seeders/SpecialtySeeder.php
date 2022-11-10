<?php

namespace Database\Seeders;

use App\Models\Specialty;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
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
                'name' => 'Dentist',
                'code' => 'DNT',
                'description' => 'Dentist'
            ],
            [
                'name' => 'Cadiologist',
                'code' => 'CDG',
                'description' => 'Cadiologist',
            ],
            [
                'name' => 'Diabetes',
                'code' => 'DBT',
                'description' => 'Diabetes',
            ]
            ];

        foreach ($specialties as $item) {
            Specialty::create($item);
        }
    }
}
