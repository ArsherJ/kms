<?php

namespace App\Imports;

use App\Models\IndividualRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndividualRecordImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Compute BMI
        $heightInCm = $row[5];
        $weightInKg = $row[6];

        // Convert height to meters (BMI formula uses meters)
        $heightInMeters = $heightInCm / 100;

        // Calculate BMI
        $bmi = $weightInKg / ($heightInMeters * $heightInMeters);
        $bmiCategory = '';
        switch (true) {
            case ($bmi < 18.5):
                $bmiCategory = "Underweight";
                break;
            case ($bmi < 25):
                $bmiCategory = "Normal Weight";
                break;
            case ($bmi < 30):
                $bmiCategory = "Overweight";
                break;
            case ($bmi < 35):
                $bmiCategory = "Obese Class I";
                break;
            case ($bmi < 40):
                $bmiCategory = "Obese Class II";
                break;
            default:
                $bmiCategory = "Obese Class III";
        }

        $idNumber = substr(rand(), 0, 9);

        // Generate some automated result from inputs
        return new IndividualRecord([
            'first_name' => $row[0],
            'middle_name' => $row[1],
            'last_name' => $row[2],
            'birthdate' => $row[3],
            'gender' => $row[4],
            'height' => $row[5],
            'weight' => $row[6],
            'id_number' => $idNumber,
            'bmi' => $bmi,
            'bmi_category' => $bmiCategory,
            'status' => 'Active',
        ]);
    }


    public function startRow(): int
    {
        return 2; // Start importing from the second row.
    }
}
