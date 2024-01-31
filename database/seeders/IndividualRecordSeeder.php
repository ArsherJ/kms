<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndividualRecordSeeder extends Seeder
{
    public function run(): void
    {
        $records =
        [
            [
                'address' => '44 F. Ocampo',
                'mother_last_name' => 'Von Wensierski',
                'mother_first_name' => 'Rimelda',
                'child_last_name' => 'Von Wensierski',
                'child_first_name' => 'Sophia',
                'sex' => 'Female',
                'birthdate' => '2022-10-20',
            ],
            [
                'address' => 'Villanueva Comp.',
                'mother_last_name' => 'Celso',
                'mother_first_name' => 'Cheryll',
                'child_last_name' => 'Celso',
                'child_first_name' => 'Ethan Rheyl',
                'sex' => 'Male',
                'birthdate' => '2022-11-25',
            ],
            [
                'address' => '366 Atis St. Man. 4B',
                'mother_last_name' => 'Artates',
                'mother_first_name' => 'Hazel',
                'child_last_name' => 'Artates',
                'child_first_name' => 'Aaliyah Jayne',
                'sex' => 'Female',
                'birthdate' => '2022-09-21',
            ],
            [
                'address' => '12 Uranium',
                'mother_last_name' => 'Erlano',
                'mother_first_name' => 'Sharmaine',
                'child_last_name' => 'Erlano',
                'child_first_name' => 'Aaron Matthew',
                'sex' => 'Male',
                'birthdate' => '2022-03-18',
            ],
            [
                'address' => '24 Atis St. Verdant',
                'mother_last_name' => 'Villanueva',
                'mother_first_name' => 'Divina',
                'child_last_name' => 'Villanueva',
                'child_first_name' => 'Aaron Sach',
                'sex' => 'Male',
                'birthdate' => '2022-01-08',
            ],
            [
                'address' => '10 Silver',
                'mother_last_name' => 'Madcasim',
                'mother_first_name' => 'Jeham',
                'child_last_name' => 'Nadcasim',
                'child_first_name' => 'Abdul Mojib',
                'sex' => 'Male',
                'birthdate' => '2022-04-20',
            ],
            [
                'address' => '3 Silver Camela 4A',
                'mother_last_name' => 'Guila',
                'mother_first_name' => 'Claudet',
                'child_last_name' => 'Guilo',
                'child_first_name' => 'Abegail',
                'sex' => 'Female',
                'birthdate' => '2022-08-03',
            ],
            [
                'address' => '18 Ubas Verdant',
                'mother_last_name' => 'Celiz',
                'mother_first_name' => 'Angela',
                'child_last_name' => 'Celiz',
                'child_first_name' => 'Abigeil',
                'sex' => 'Female',
                'birthdate' => '2022-12-22',
            ],
            [
                'address' => 'Thelma Villa Cristina',
                'mother_last_name' => 'Apog',
                'mother_first_name' => 'Bernadette',
                'child_last_name' => 'Belando',
                'child_first_name' => 'Abriana Brielle',
                'sex' => 'Female',
                'birthdate' => '2023-11-05',
            ],
            [
                'address' => 'Greenview',
                'mother_last_name' => 'Pineda',
                'mother_first_name' => 'Athena',
                'child_last_name' => 'Pineda',
                'child_first_name' => 'Abrianah',
                'sex' => 'Female',
                'birthdate' => '2022-11-12',
            ],
            [
                'address' => 'Hernandez',
                'mother_last_name' => 'Bacatan',
                'mother_first_name' => 'Keithlin',
                'child_last_name' => 'Bacatan',
                'child_first_name' => 'Acashia Faith',
                'sex' => 'Female',
                'birthdate' => '2022-08-01',
            ],
            [
                'address' => 'Monique',
                'mother_last_name' => 'Jeniebre',
                'mother_first_name' => 'Chabelita',
                'child_last_name' => 'Beron',
                'child_first_name' => 'Ace Caleb',
                'sex' => 'Male',
                'birthdate' => '2022-10-24',
            ],
            [
                'address' => '50 Molave St. Manuela',
                'mother_last_name' => 'Doumbo',
                'mother_first_name' => 'Aira',
                'child_last_name' => 'Doumbo',
                'child_first_name' => 'Ace',
                'sex' => 'Male',
                'birthdate' => '2023-10-12',
            ],
            [
                'address' => '15 Saging',
                'mother_last_name' => 'Beron',
                'mother_first_name' => 'Chabelita',
                'child_last_name' => 'Beron',
                'child_first_name' => 'Ace Kaleb',
                'sex' => 'Male',
                'birthdate' => '2022-10-24',
            ],
            [
                'address' => 'Hernandez',
                'mother_last_name' => 'Azusenas',
                'mother_first_name' => 'Ara Mae',
                'child_last_name' => 'Quimbo',
                'child_first_name' => 'Ace',
                'sex' => 'Male',
                'birthdate' => '2022-10-12',
            ],
            [
                'address' => '25 Guio',
                'mother_last_name' => 'Miraflor',
                'mother_first_name' => 'Marjorie',
                'child_last_name' => 'Miraflor',
                'child_first_name' => 'Acer Jacob',
                'sex' => 'Male',
                'birthdate' => '2022-12-04',
            ],
            [
                'address' => 'Batibot',
                'mother_last_name' => 'Palwa',
                'mother_first_name' => 'Lharamel',
                'child_last_name' => 'Doctor',
                'child_first_name' => 'Acevone Lucas',
                'sex' => 'Male',
                'birthdate' => '2022-09-11',
            ],
            [
                'address' => '45 Kasoy St',
                'mother_last_name' => 'Saberano',
                'mother_first_name' => 'Krystel Jay',
                'child_last_name' => 'Saberano',
                'child_first_name' => 'Ada Yrza',
                'sex' => 'Female',
                'birthdate' => '2022-10-17',
            ],
            [
                'address' => 'Adelfa St. DMS',
                'mother_last_name' => 'Belardo',
                'mother_first_name' => 'Princess',
                'child_last_name' => 'Belardo',
                'child_first_name' => 'Adam',
                'sex' => 'Male',
                'birthdate' => '2022-04-10',
            ],
            [
                'address' => '254 Atis Manuela',
                'mother_last_name' => 'Castañaday',
                'mother_first_name' => 'Marivic',
                'child_last_name' => 'Castañaday',
                'child_first_name' => 'Adam Gian',
                'sex' => 'Male',
                'birthdate' => '2023-12-14',
            ],
        ];

        $commonData =
        [
            'height'  => '0',
            'weight'  => '0',
            'length'  => '0',
            'ip_group' => 'No',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ];

        foreach ($records as $record)
        {
            $data = array_merge($commonData, $record);
            DB::table('individual_records')->insert($data);
        }
    }
}