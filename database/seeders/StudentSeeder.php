<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inser students data
        Student::insert([
            ['name' => 'Tayyab',
            'age'   => 12,
            'email' => 'tayyabsabir72@gmail.com',
            'phone' => '03000441251',
            'city_id' => 1
        ],
        [   'name' => 'Kamran',
            'age'   => 12,
            'email' => 'kamran@gmail.com',
            'phone' => '0312435468',
            'city_id' => 2
        ]
        ]);
    }
}
