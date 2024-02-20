<?php

namespace App\Imports;

use App\Models\IndividualRecord;
use App\Models\HistoryOfIndividualRecord;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DateTime;

class IndividualRecordImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        // Validate the array structure and data here if needed
        if (count($row) >= 12) {

                // Calculate age in months
            $ageInMonths = $this->calculateAgeInMonths($row[7]);

            // Calculate weight for age status
            $weightForAgeStatus = $this->calculateWeightForAgeStatus($ageInMonths, $row[6], $row[11]);
            

            // Create IndividualRecord
            $individualRecord = new IndividualRecord([
                'child_number' => $row[0],
                'address' => $row[1],
                'mother_last_name' => $row[2],
                'mother_first_name' => $row[3],
                'child_last_name' => $row[4],
                'child_first_name' => $row[5],
                'sex' => $row[6],
                'birthdate' => $row[7],
                'ip_group' => $row[8],
                'micronutrient' => $row[9],
                'height' => $row[10],
                'weight' => $row[11],
                'weight_for_age_status' => $weightForAgeStatus,
            ]);

            // Save IndividualRecord to the database
            $individualRecord->save();

            // Create HistoryOfIndividualRecord
            $historyRecord = new HistoryOfIndividualRecord([
                'child_number' => $row[0],
                'address' => $row[1],
                'mother_last_name' => $row[2],
                'mother_first_name' => $row[3],
                'child_last_name' => $row[4],
                'child_first_name' => $row[5],
                'sex' => $row[6],
                'birthdate' => $row[7],
                'ip_group' => $row[8],
                'micronutrient' => $row[9],
                'height' => $row[10],
                'weight' => $row[11],
                'weight_for_age_status' => $this->calculateWeightForAgeStatus($this->calculateAgeInMonths($row[7]), $row[6], $row[11]),
                // Add other fields as needed
            ]);

            // Save HistoryOfIndividualRecord to the database
            $historyRecord->save();

            return $individualRecord;
        }

        Log::error('Row does not have enough elements: ' . json_encode($row));
        return null;
    }

    private function calculateAgeInMonths($birthdate) {
        $birthDateTime = new DateTime($birthdate);
        $currentDateTime = new DateTime();
        $interval = $currentDateTime->diff($birthDateTime);
        $ageInMonths = $interval->y * 12 + $interval->m;
        return $ageInMonths;
    }

    private function calculateWeightForAgeStatus($ageInMonths, $sex, $weight) {
        
        // Switch statement for different age ranges
        switch ($ageInMonths) {
            case 1:
                if ($sex === "Male") { return setWeightForAgeStatus(2.9, 3.0, 5.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(2.7, 2.8, 5.5); }
                break;
            case 2:
                if ($sex === "Male") { return setWeightForAgeStatus(3.8, 3.9, 7.1); }
                else if ($sex === "Female") { return setWeightForAgeStatus(3.4, 3.5, 6.6); }
                break;
            case 3:
                if ($sex === "Male") { return setWeightForAgeStatus(4.4, 4.5, 8.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.0, 4.1, 7.5); }
                break;
            case 4:
                if ($sex === "Male") { return setWeightForAgeStatus(4.9, 5.0, 8.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.4, 4.5, 8.2); }
                break;
            case 5:
                if ($sex === "Male") { return setWeightForAgeStatus(5.3, 5.4, 9.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.8, 4.9, 8.8); }
                break;
            case 6:
                if ($sex === "Male") { return setWeightForAgeStatus(5.7, 5.8, 9.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.1, 5.2, 9.3); }
                break;
            case 7:
                if ($sex === "Male") { return setWeightForAgeStatus(5.9, 6.0, 10.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.3, 5.4, 9.8); }
                break;
            case 8:
                if ($sex === "Male") { return setWeightForAgeStatus(6.2, 6.3, 10.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.6, 5.7, 10.2); }
                break;
            case 9:
                if ($sex === "Male") { return setWeightForAgeStatus(6.4, 6.5, 11.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.8, 5.9, 10.5); }
                break;
            case 10:
                if ($sex === "Male") { return setWeightForAgeStatus(6.6, 6.7, 11.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.9, 6.0, 10.9); }
                break;
            case 11:
                if ($sex === "Male") { return setWeightForAgeStatus(6.8, 6.9, 11.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.1, 6.2, 11.2); }
                break;
            case 12:
                if ($sex === "Male") { return setWeightForAgeStatus(6.9, 7.0, 12.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.3, 6.4, 11.5); }
                break;
            case 13:
                if ($sex === "Male") { return setWeightForAgeStatus(7.1, 7.2, 12.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.4, 6.5, 11.8); }
                break;
            case 14:
                if ($sex === "Male") { return setWeightForAgeStatus(7.2, 7.3, 12.6); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.6, 6.7, 12.1); }
                break;
            case 15:
                if ($sex === "Male") { return setWeightForAgeStatus(7.4, 7.5, 12.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.7, 6.8, 12.4); }
                break;
            case 16:
                if ($sex === "Male") { return setWeightForAgeStatus(7.5, 7.6, 13.1); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.9, 7.0, 12.6); }
                break;
            case 17:
                if ($sex === "Male") { return setWeightForAgeStatus(7.7, 7.8, 13.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.9, 7.0, 12.9); }
                break;
            case 18:
                if ($sex === "Male") { return setWeightForAgeStatus(7.8, 7.9, 13.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.2, 7.3, 13.2); }
                break;
            case 19:
                if ($sex === "Male") { return setWeightForAgeStatus(8.0, 8.1, 13.9); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.3, 7.4, 13.5); }
                break;
            case 20:
                if ($sex === "Male") { return setWeightForAgeStatus(8.1, 8.2, 14.2); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.5, 7.6, 13.7); }
                break;
            case 21:
                if ($sex === "Male") { return setWeightForAgeStatus(8.2, 8.3, 14.5); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.6, 7.7, 14.0); }
                break;
            case 22:
                if ($sex === "Male") { return setWeightForAgeStatus(8.4, 8.5, 14.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.8, 7.9, 14.3); }
                break;
            case 23:
                if ($sex === "Male") { return setWeightForAgeStatus(8.5, 8.6, 15.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.9, 8.0, 14.6); }
                break;
            case 24:
                if ($sex === "Male") { return setWeightForAgeStatus(8.6, 8.7, 15.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.1, 8.2, 14.9); }
                break;
            case 25:
                if ($sex === "Male") { return setWeightForAgeStatus(8.7, 8.8, 15.6); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.2, 8.3, 15.2); }
                break;
            case 26:
                if ($sex === "Male") { return setWeightForAgeStatus(8.9, 9.0, 15.9); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.4, 8.5, 15.5); }
                break;
            case 27:
                if ($sex === "Male") { return setWeightForAgeStatus(9.0, 9.1, 16.2); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.5, 8.6, 15.8); }
                break;
            case 28:
                if ($sex === "Male") { return setWeightForAgeStatus(9.1, 9.2, 16.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.7, 8.8, 16.1); }
                break;
            case 29:
                if ($sex === "Male") { return setWeightForAgeStatus(9.2, 9.3, 16.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.8, 8.9, 16.4); }
                break;
            case 30:
                if ($sex === "Male") { return setWeightForAgeStatus(9.4, 9.5, 17.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.0, 9.1, 16.7); }
                break;
            case 31:
                if ($sex === "Male") { return setWeightForAgeStatus(9.5, 9.6, 17.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.2, 9.3, 17.0); }
                break;
            case 32:
                if ($sex === "Male") { return setWeightForAgeStatus(9.6, 9.7, 17.6); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.3, 9.4, 17.3); }
                break;
            case 33:
                if ($sex === "Male") { return setWeightForAgeStatus(9.7, 9.8, 17.9); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.5, 9.6, 17.6); }
                break;
            case 34:
                if ($sex === "Male") { return setWeightForAgeStatus(9.9, 10.0, 18.1); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.7, 9.8, 17.9); }
                break;
            case 35:
                if ($sex === "Male") { return setWeightForAgeStatus(10.0, 10.1, 18.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.8, 9.9, 18.2); }
                break;
            case 36:
                if ($sex === "Male") { return setWeightForAgeStatus(10.1, 10.2, 18.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.0, 10.1, 18.5); }
                break;
            case 37:
                if ($sex === "Male") { return setWeightForAgeStatus(10.3, 10.4, 19.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.2, 10.3, 18.8); }
                break;
            case 38:
                if ($sex === "Male") { return setWeightForAgeStatus(10.4, 10.5, 19.2); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.3, 10.4, 19.1); }
                break;
            case 39:
                if ($sex === "Male") { return setWeightForAgeStatus(10.5, 10.6, 19.5); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.5, 10.6, 19.4); }
                break;
            case 40:
                if ($sex === "Male") { return setWeightForAgeStatus(10.6, 10.7, 19.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.7, 10.8, 19.7); }
                break;
            case 41:
                if ($sex === "Male") { return setWeightForAgeStatus(10.8, 10.9, 20.1); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.9, 11.0, 20.0); }
                break;
            case 42:
                if ($sex === "Male") { return setWeightForAgeStatus(10.9, 11.0, 20.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.1, 11.2, 20.3); }
                break;
            case 43:
                if ($sex === "Male") { return setWeightForAgeStatus(11.0, 11.1, 20.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.2, 11.3, 20.6); }
                break;
            case 44:
                if ($sex === "Male") { return setWeightForAgeStatus(11.2, 11.3, 21.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.4, 11.5, 20.9); }
                break;
            case 45:
                if ($sex === "Male") { return setWeightForAgeStatus(11.3, 11.4, 21.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.6, 11.7, 21.2); }
                break;
            case 46:
                if ($sex === "Male") { return setWeightForAgeStatus(11.5, 11.6, 21.6); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.8, 11.9, 21.5); }
                break;
            case 47:
                if ($sex === "Male") { return setWeightForAgeStatus(11.6, 11.7, 21.9); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.9, 12.0, 21.8); }
                break;
            case 48:
                if ($sex === "Male") { return setWeightForAgeStatus(11.8, 11.9, 22.2); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.1, 12.2, 22.1); }
                break;
            case 49:
                if ($sex === "Male") { return setWeightForAgeStatus(11.9, 12.0, 22.5); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.3, 12.4, 22.4); }
                break;
            case 50:
                if ($sex === "Male") { return setWeightForAgeStatus(12.1, 12.2, 22.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.5, 12.6, 22.7); }
                break;
            case 51:
                if ($sex === "Male") { return setWeightForAgeStatus(12.2, 12.3, 23.1); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.7, 12.8, 23.0); }
                break;
            case 52:
                if ($sex === "Male") { return setWeightForAgeStatus(12.4, 12.5, 23.4); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.9, 13.0, 23.3); }
                break;
            case 53:
                if ($sex === "Male") { return setWeightForAgeStatus(12.5, 12.6, 23.7); }
                else if ($sex === "Female") { return setWeightForAgeStatus(13.1, 13.2, 23.6); }
                break;
            case 54:
                if ($sex === "Male") { return setWeightForAgeStatus(12.7, 12.8, 24.0); }
                else if ($sex === "Female") { return setWeightForAgeStatus(13.3, 13.4, 23.9); }
                break;
            case 55:
                if ($sex === "Male") { return setWeightForAgeStatus(12.8, 12.9, 24.3); }
                else if ($sex === "Female") { return setWeightForAgeStatus(13.5, 13.6, 24.2); }
                break;
            case 56:
                if ($sex === "Male") { return setWeightForAgeStatus(13.0, 13.1, 24.6); }
                else if ($sex === "Female") { return setWeightForAgeStatus(13.7, 13.8, 24.5); }
                break;
            case 57:
                if ($sex === "Male") { return setWeightForAgeStatus(13.1, 13.2, 24.9); }
                else if ($sex === "Female") { return setWeightForAgeStatus(13.9, 14.0, 24.8); }
                break;
            case 58:
                if ($sex === "Male") { return setWeightForAgeStatus(13.3, 13.4, 25.2); }
                else if ($sex === "Female") { return setWeightForAgeStatus(14.1, 14.2, 25.1); }
                break;
            case 59:
                if ($sex === "Male") { return setWeightForAgeStatus(13.4, 13.5, 25.5); }
                else if ($sex === "Female") { return setWeightForAgeStatus(14.3, 14.4, 25.4); }
                break;
            case 60:
                if ($sex === "Male") { return setWeightForAgeStatus(13.6, 13.7, 25.8); }
                else if ($sex === "Female") { return setWeightForAgeStatus(14.5, 14.6, 25.7); }
                break;
            default:
                return "Out of range";
        }
    }

    public function startRow(): int
    {
        return 2; // Assuming header is in the first row and data starts from the second row.
    }
}

function setWeightForAgeStatus($severelyUnderweightLimit, $underweightLimit, $normalLimit) {
    global $result, $weight;
    if ($weight <= $severelyUnderweightLimit) { 
        return "Severely Underweight"; 
    } else if ($weight >= $underweightLimit && $weight <= $normalLimit) { 
        return "Underweight"; 
    } else if ($weight > $normalLimit) { 
        return "Normal"; 
    }
}