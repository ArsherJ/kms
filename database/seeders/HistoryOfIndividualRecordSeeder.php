<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class HistoryOfIndividualRecordSeeder extends Seeder
{
    public function run(): void
    {
        $triggers =
        [
            'calculate_age_in_months',
            'calculate_weight_for_age_status'
        ];

        foreach ($triggers as $triggerName)
        {
            DB::unprepared("DROP TRIGGER IF EXISTS $triggerName");

            $triggerExists = DB::select("SHOW TRIGGERS LIKE '$triggerName'");

            if (!$triggerExists)
            {
                if ($triggerName === 'calculate_age_in_months')
                {
                    DB::unprepared
                    ('
                        CREATE TRIGGER calculate_age_in_months BEFORE INSERT ON history_of_individual_records
                        FOR EACH ROW
                            BEGIN
                                SET NEW.age_in_months = TIMESTAMPDIFF(MONTH, NEW.birthdate, NOW());

                                IF NEW.age_in_months BETWEEN 0 AND 5
                                THEN SET NEW.micronutrient = "No";
                                ELSEIF NEW.age_in_months BETWEEN 6 AND 23
                                THEN SET NEW.micronutrient = "Yes";
                                ELSE SET NEW.micronutrient = "No";
                                END IF;
                            END;
                    ');
                }
                else if ($triggerName === 'calculate_weight_for_age_status')
                {
                    DB::unprepared
                    ('
                        CREATE TRIGGER calculate_weight_for_age_status BEFORE INSERT ON history_of_individual_records
                        FOR EACH ROW
                            BEGIN
                                SET NEW.weight_for_age_status = CASE NEW.age_in_months
                                    WHEN 0 THEN
                                        CASE
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 2.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 2.1 AND NEW.weight <= 2.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 2.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 2.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 2.0 AND NEW.weight <= 2.1 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 2.1 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 1 THEN
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 2.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 2.9 AND NEW.weight <= 3.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 3.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 2.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 2.7 AND NEW.weight <= 2.8 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 2.8 THEN "Normal"
                                            ELSE "Unknown"
                                    END
                                    WHEN 2 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 3.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 3.8 AND NEW.weight <= 3.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 3.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 3.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 3.4 AND NEW.weight <= 3.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 3.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 3 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 4.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 4.4 AND NEW.weight <= 4.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 4.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 4.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 4.0 AND NEW.weight <= 4.1 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 4.1 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 4 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 4.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 4.9 AND NEW.weight <= 5.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 5.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 4.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 4.4 AND NEW.weight <= 4.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 4.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 5 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 5.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 5.3 AND NEW.weight <= 5.4 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 5.4 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 4.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 4.8 AND NEW.weight <= 4.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 4.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 6 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 5.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 5.7 AND NEW.weight <= 5.8 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 5.8 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 5.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 5.1 AND NEW.weight <= 5.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 5.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 7 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 5.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 5.9 AND NEW.weight <= 6.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 6.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 5.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 5.3 AND NEW.weight <= 5.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 5.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 8 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 6.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 6.2 AND NEW.weight <= 6.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 6.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 5.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 5.6 AND NEW.weight <= 5.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 5.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 9 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 6.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 6.4 AND NEW.weight <= 6.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 6.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 5.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 5.8 AND NEW.weight <= 5.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 5.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 10 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 6.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 6.6 AND NEW.weight <= 6.7 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 6.7 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 5.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 5.9 AND NEW.weight <= 6.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 11 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 6.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 6.8 AND NEW.weight <= 6.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 6.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.1 AND NEW.weight <= 6.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 12 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.3 AND NEW.weight <= 6.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 13 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.1 AND NEW.weight <= 7.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.4 AND NEW.weight <= 6.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 14 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.2 AND NEW.weight <= 7.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.6 AND NEW.weight <= 6.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 15 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.4 AND NEW.weight <= 7.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.7 AND NEW.weight <= 6.8 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 6.8 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 16 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.5 AND NEW.weight <= 7.6 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.6 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 17 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.7 AND NEW.weight <= 7.8 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.8 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 18 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 7.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 7.8 AND NEW.weight <= 7.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 7.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.2 AND NEW.weight <= 7.3 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.3 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 19 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.0 AND NEW.weight <= 8.1 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.1 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.3 AND NEW.weight <= 7.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 20 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.1 AND NEW.weight <= 8.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.5 AND NEW.weight <= 6.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 21 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.2 AND NEW.weight <= 8.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.6 AND NEW.weight <= 7.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 22 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.4 AND NEW.weight <= 8.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.8 AND NEW.weight <= 7.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 7.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 23 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.5 AND NEW.weight <= 8.6 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.6 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 7.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 7.9 AND NEW.weight <= 8.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 24 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.6 AND NEW.weight <= 8.7 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.7 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.1 AND NEW.weight <= 8.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 25 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.8 AND NEW.weight <= 8.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 8.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.2 AND NEW.weight <= 8.3 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.3 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 26 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 8.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 8.9 AND NEW.weight <= 9.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.4 AND NEW.weight <= 8.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 27 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.0 AND NEW.weight <= 9.1 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.1 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.5 AND NEW.weight <= 8.6 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.6 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 28 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.1 AND NEW.weight <= 9.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.6 AND NEW.weight <= 8.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 29 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.2 AND NEW.weight <= 9.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.8 AND NEW.weight <= 8.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 8.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 30 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.4 AND NEW.weight <= 9.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 8.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 8.9 AND NEW.weight <= 9.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 31 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.5 AND NEW.weight <= 9.6 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.6 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.0 AND NEW.weight <= 9.1 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.1 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 32 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.6 AND NEW.weight <= 9.7 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.7 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.1 AND NEW.weight <= 9.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 33 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.7 AND NEW.weight <= 9.8 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.8 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.3 AND NEW.weight <= 9.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 34 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.8 AND NEW.weight <= 9.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 9.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.4 AND NEW.weight <= 9.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 35 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 9.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 9.9 AND NEW.weight <= 10.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.5 AND NEW.weight <= 9.6 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.6 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 36 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.0 AND NEW.weight <= 10.1 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.1 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.6 AND NEW.weight <= 9.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 37 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.1 AND NEW.weight <= 10.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.7 AND NEW.weight <= 9.8 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.8 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 38 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.2 AND NEW.weight <= 10.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.8 AND NEW.weight <= 9.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 9.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 39 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.3 AND NEW.weight <= 10.4 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.4 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 9.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 9.9 AND NEW.weight <= 10.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 40 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.4 AND NEW.weight <= 10.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.1 AND NEW.weight <= 10.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 41 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.5 AND NEW.weight <= 10.6 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.6 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.2 AND NEW.weight <= 10.3 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.3 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 42 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.6 AND NEW.weight <= 10.7 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.7 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.3 AND NEW.weight <= 10.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 43 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.7 AND NEW.weight <= 10.8 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.8 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.4 AND NEW.weight <= 10.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 44 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.8 AND NEW.weight <= 10.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 10.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.5 AND NEW.weight <= 10.6 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.6 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 45 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 10.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 10.9 AND NEW.weight <= 11.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.6 AND NEW.weight <= 10.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 46 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.0 AND NEW.weight <= 11.1 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.1 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.7 AND NEW.weight <= 10.8 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.8 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 47 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.1 AND NEW.weight <= 11.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.8 AND NEW.weight <= 10.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 10.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 48 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.2 AND NEW.weight <= 11.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 10.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 10.9 AND NEW.weight <= 11.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 49 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.3 AND NEW.weight <= 11.4 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.4 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.0 AND NEW.weight <= 11.1 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.1 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 50 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.4 AND NEW.weight <= 11.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.1 AND NEW.weight <= 11.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 51 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.5 AND NEW.weight <= 11.6 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.6 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.2 AND NEW.weight <= 11.3 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.3 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 52 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.6 AND NEW.weight <= 11.7 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.7 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.3 AND NEW.weight <= 11.4 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.4 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 53 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.7 AND NEW.weight <= 11.8 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.8 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.4 AND NEW.weight <= 11.5 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.5 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 54 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.8 AND NEW.weight <= 11.9 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 11.9 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.5 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.5 AND NEW.weight <= 11.6 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.6 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 55 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 11.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 11.9 AND NEW.weight <= 12.0 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.0 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.6 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.6 AND NEW.weight <= 11.7 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.7 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 56 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 12.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 12.0 AND NEW.weight <= 12.1 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.1 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.7 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.7 AND NEW.weight <= 11.8 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.8 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 57 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 12.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 12.1 AND NEW.weight <= 12.2 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.2 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.8 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.8 AND NEW.weight <= 11.9 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 11.9 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 58 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 12.2 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 12.2 AND NEW.weight <= 12.3 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.3 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 11.9 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 11.9 AND NEW.weight <= 12.0 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 12.0 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 59 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 12.3 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 12.3 AND NEW.weight <= 12.4 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.4 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 12.0 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 12.0 AND NEW.weight <= 12.1 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 12.1 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    WHEN 60 THEN 
                                        CASE 
                                            WHEN NEW.sex = "Male" AND NEW.weight <= 12.4 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight >= 12.4 AND NEW.weight <= 12.5 THEN "Underweight"
                                            WHEN NEW.sex = "Male" AND NEW.weight > 12.5 THEN "Normal"
                                            WHEN NEW.sex = "Female" AND NEW.weight <= 12.1 THEN "Severely Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight >= 12.1 AND NEW.weight <= 12.2 THEN "Underweight"
                                            WHEN NEW.sex = "Female" AND NEW.weight > 12.2 THEN "Normal"
                                            ELSE "Unknown"
                                        END
                                    ELSE "Unknown"
                                END;
                            END;
                    ');
                }
            }
        }

        $faker = Faker::create();

        $records =
        [
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '44 F. Ocampo',
                'mother_last_name' => 'Von Wensierski',
                'mother_first_name' => 'Rimelda',
                'child_last_name' => 'Von Wensierski',
                'child_first_name' => 'Sophia',
                'sex' => 'Female',
                'birthdate' => '2023-10-20',
                'height'  => '57.2',
                'weight'  => '4.4',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Villanueva Comp.',
                'mother_last_name' => 'Celso',
                'mother_first_name' => 'Cheryll',
                'child_last_name' => 'Celso',
                'child_first_name' => 'Ethan Rheyl',
                'sex' => 'Male',
                'birthdate' => '2023-11-25',
                'height'  => '44.1',
                'weight'  => '6.7',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '366 Atis St. Man. 4B',
                'mother_last_name' => 'Artates',
                'mother_first_name' => 'Hazel',
                'child_last_name' => 'Artates',
                'child_first_name' => 'Aaliyah Jayne',
                'sex' => 'Female',
                'birthdate' => '2023-09-21',
                'height'  => '62.5',
                'weight'  => '8.2',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '12 Uranium',
                'mother_last_name' => 'Erlano',
                'mother_first_name' => 'Sharmaine',
                'child_last_name' => 'Erlano',
                'child_first_name' => 'Aaron Matthew',
                'sex' => 'Male',
                'birthdate' => '2023-03-18',
                'height'  => '80.2',
                'weight'  => '7.9',
            ],
                [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '24 Atis St. Verdant',
                'mother_last_name' => 'Villanueva',
                'mother_first_name' => 'Divina',
                'child_last_name' => 'Villanueva',
                'child_first_name' => 'Aaron Sach',
                'sex' => 'Male',
                'birthdate' => '2023-01-08',
                'height'  => '70.2',
                'weight'  => '6.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '10 Silver',
                'mother_last_name' => 'Madcasim',
                'mother_first_name' => 'Jeham',
                'child_last_name' => 'Nadcasim',
                'child_first_name' => 'Abdul Mojib',
                'sex' => 'Male',
                'birthdate' => '2023-04-20',
                'height'  => '65.5',
                'weight'  => '5.7',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '3 Silver Camela 4A',
                'mother_last_name' => 'Guila',
                'mother_first_name' => 'Claudet',
                'child_last_name' => 'Guilo',
                'child_first_name' => 'Abegail',
                'sex' => 'Female',
                'birthdate' => '2023-08-03',
                'height'  => '57.2',
                'weight'  => '4.4',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '18 Ubas Verdant',
                'mother_last_name' => 'Celiz',
                'mother_first_name' => 'Angela',
                'child_last_name' => 'Celiz',
                'child_first_name' => 'Abigeil',
                'sex' => 'Female',
                'birthdate' => '2023-12-22',
                'height'  => '70.2',
                'weight'  => '6.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Thelma Villa Cristina',
                'mother_last_name' => 'Apog',
                'mother_first_name' => 'Bernadette',
                'child_last_name' => 'Belando',
                'child_first_name' => 'Abriana Brielle',
                'sex' => 'Female',
                'birthdate' => '2023-11-05',
                'height'  => '44.1',
                'weight'  => '6.7',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Greenview',
                'mother_last_name' => 'Pineda',
                'mother_first_name' => 'Athena',
                'child_last_name' => 'Pineda',
                'child_first_name' => 'Abrianah',
                'sex' => 'Female',
                'birthdate' => '2023-11-12',
                'height'  => '62.5',
                'weight'  => '8.2',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Hernandez',
                'mother_last_name' => 'Bacatan',
                'mother_first_name' => 'Keithlin',
                'child_last_name' => 'Bacatan',
                'child_first_name' => 'Acashia Faith',
                'sex' => 'Female',
                'birthdate' => '2023-08-01',
                'height'  => '57.2',
                'weight'  => '4.4',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Monique',
                'mother_last_name' => 'Jeniebre',
                'mother_first_name' => 'Chabelita',
                'child_last_name' => 'Beron',
                'child_first_name' => 'Ace Caleb',
                'sex' => 'Male',
                'birthdate' => '2023-10-24',
                'height'  => '44.1',
                'weight'  => '6.7',
            ],
                [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '50 Molave St. Manuela',
                'mother_last_name' => 'Doumbo',
                'mother_first_name' => 'Aira',
                'child_last_name' => 'Doumbo',
                'child_first_name' => 'Ace',
                'sex' => 'Male',
                'birthdate' => '2023-10-12',
                'height'  => '80.2',
                'weight'  => '7.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '15 Saging',
                'mother_last_name' => 'Beron',
                'mother_first_name' => 'Chabelita',
                'child_last_name' => 'Beron',
                'child_first_name' => 'Ace Kaleb',
                'sex' => 'Male',
                'birthdate' => '2023-10-24',
                'height'  => '44.1',
                'weight'  => '6.7',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Hernandez',
                'mother_last_name' => 'Azusenas',
                'mother_first_name' => 'Ara Mae',
                'child_last_name' => 'Quimbo',
                'child_first_name' => 'Ace',
                'sex' => 'Male',
                'birthdate' => '2023-10-12',
                'height'  => '70.2',
                'weight'  => '6.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '25 Guio',
                'mother_last_name' => 'Miraflor',
                'mother_first_name' => 'Marjorie',
                'child_last_name' => 'Miraflor',
                'child_first_name' => 'Acer Jacob',
                'sex' => 'Male',
                'birthdate' => '2023-12-04',
                'height'  => '62.5',
                'weight'  => '8.2',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Batibot',
                'mother_last_name' => 'Palwa',
                'mother_first_name' => 'Lharamel',
                'child_last_name' => 'Doctor',
                'child_first_name' => 'Acevone Lucas',
                'sex' => 'Male',
                'birthdate' => '2023-09-11',
                'height'  => '57.2',
                'weight'  => '4.4',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '45 Kasoy St',
                'mother_last_name' => 'Saberano',
                'mother_first_name' => 'Krystel Jay',
                'child_last_name' => 'Saberano',
                'child_first_name' => 'Ada Yrza',
                'sex' => 'Female',
                'birthdate' => '2023-10-17',
                'height'  => '80.2',
                'weight'  => '7.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => 'Adelfa St. DMS',
                'mother_last_name' => 'Belardo',
                'mother_first_name' => 'Princess',
                'child_last_name' => 'Belardo',
                'child_first_name' => 'Adam',
                'sex' => 'Male',
                'birthdate' => '2023-04-10',
                'height'  => '80.2',
                'weight'  => '7.9',
            ],
            [
                'child_number' => $childNumber = $faker->numberBetween(100, 999),
                'address' => '254 Atis Manuela',
                'mother_last_name' => 'Castañaday',
                'mother_first_name' => 'Marivic',
                'child_last_name' => 'Castañaday',
                'child_first_name' => 'Adam Gian',
                'sex' => 'Male',
                'birthdate' => '2023-12-14',
                'height'  => '44.1',
                'weight'  => '6.7',
            ],
        ];

        $commonData =
        [
            'ip_group' => 'No',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ];

        foreach ($records as $record)
        {
            $data = array_merge($commonData, $record);
            DB::table('history_of_individual_records')->insert($data);
        }
    }
}