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

            // Calculate height length for age status
            $heightLengthForAgeStatus = $this->calculateHeightLengthForAgeStatus($ageInMonths, $row[6], $row[10]);
            
            $weightForLengthStatus = $this->calculateWgtHtstatus($row[10], $ageInMonths, $row[11], $row[6]);

            // Get today's date
            $dateToday = $this->date_today();


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
                'age_in_months' => $ageInMonths,
                'date_measured' => $dateToday,
                'weight_for_age_status' => $weightForAgeStatus,
                'height_length_for_age_status' => $heightLengthForAgeStatus,
                'weight_for_length_status' => $weightForLengthStatus,
                
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
                'age_in_months' => $ageInMonths,
                'date_measured' => $dateToday,
                'weight_for_age_status' => $weightForAgeStatus,
                'height_length_for_age_status' => $heightLengthForAgeStatus,
                'weight_for_length_status' => $weightForLengthStatus,
                // Add other fields as needed
            ]);

            // Save HistoryOfIndividualRecord to the database
            $historyRecord->save();

            return $individualRecord;
        }

        Log::error('Row does not have enough elements: ' . json_encode($row));
        return null;
    }

    private function date_today() {
        return date('Y-m-d');
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
            case 0:
                if (sex === "Male") { return setWeightForAgeStatus(2.1, 2.2, 4.4, $weight); }
                else if (sex === "Female") { return setWeightForAgeStatus(2.0, 2.1, 4.2, $weight); }
                break;
            case 1:
                if ($sex === "Male") { return setWeightForAgeStatus(2.9, 3.0, 5.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(2.7, 2.8, 5.5, $weight); }
                break;
            case 2:
                if ($sex === "Male") { return setWeightForAgeStatus(3.8, 3.9, 7.1, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(3.4, 3.5, 6.6, $weight); }
                break;
            case 3:
                if ($sex === "Male") { return setWeightForAgeStatus(4.4, 4.5, 8.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.0, 4.1, 7.5, $weight); }
                break;
            case 4:
                if ($sex === "Male") { return setWeightForAgeStatus(4.9, 5.0, 8.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.4, 4.5, 8.2, $weight); }
                break;
            case 5:
                if ($sex === "Male") { return setWeightForAgeStatus(5.3, 5.4, 9.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(4.8, 4.9, 8.8, $weight); }
                break;
            case 6:
                if ($sex === "Male") { return setWeightForAgeStatus(5.7, 5.8, 9.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.1, 5.2, 9.3, $weight); }
                break;
            case 7:
                if ($sex === "Male") { return setWeightForAgeStatus(5.9, 6.0, 10.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.3, 5.4, 9.8, $weight); }
                break;
            case 8:
                if ($sex === "Male") { return setWeightForAgeStatus(6.2, 6.3, 10.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.6, 5.7, 10.2, $weight); }
                break;
            case 9:
                if ($sex === "Male") { return setWeightForAgeStatus(6.4, 6.5, 11.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.8, 5.9, 10.5, $weight); }
                break;
            case 10:
                if ($sex === "Male") { return setWeightForAgeStatus(6.6, 6.7, 11.4, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(5.9, 6.0, 10.9, $weight); }
                break;
            case 11:
                if ($sex === "Male") { return setWeightForAgeStatus(6.8, 6.9, 11.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.1, 6.2, 11.2, $weight); }
                break;
            case 12:
                if ($sex === "Male") { return setWeightForAgeStatus(6.9, 7.0, 12.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.3, 6.4, 11.5, $weight); }
                break;
            case 13:
                if ($sex === "Male") { return setWeightForAgeStatus(7.1, 7.2, 12.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.4, 6.5, 11.8, $weight); }
                break;
            case 14:
                if ($sex === "Male") { return setWeightForAgeStatus(7.2, 7.3, 12.6, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.6, 6.7, 12.1, $weight); }
                break;
            case 15:
                if ($sex === "Male") { return setWeightForAgeStatus(7.4, 7.5, 12.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.7, 6.8, 12.4, $weight); }
                break;
            case 16:
                if ($sex === "Male") { return setWeightForAgeStatus(7.5, 7.6, 13.1, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.9, 7.0, 12.6, $weight); }
                break;
            case 17:
                if ($sex === "Male") { return setWeightForAgeStatus(7.7, 7.8, 13.4, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(6.9, 7.0, 12.9, $weight); }
                break;
            case 18:
                if ($sex === "Male") { return setWeightForAgeStatus(7.8, 7.9, 13.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.2, 7.3, 13.2, $weight); }
                break;
            case 19:
                if ($sex === "Male") { return setWeightForAgeStatus(8.0, 8.1, 13.9, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.3, 7.4, 13.5, $weight); }
                break;
            case 20:
                if ($sex === "Male") { return setWeightForAgeStatus(8.1, 8.2, 14.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.5, 7.6, 13.7, $weight); }
                break;
            case 21:
                if ($sex === "Male") { return setWeightForAgeStatus(8.2, 8.3, 14.5, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.6, 7.7, 14.0, $weight); }
                break;
            case 22:
                if ($sex === "Male") { return setWeightForAgeStatus(8.4, 8.5, 14.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.8, 7.9, 14.3, $weight); }
                break;
            case 23:
                if ($sex === "Male") { return setWeightForAgeStatus(8.5, 8.6, 15.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(7.9, 8.0, 14.6, $weight); }
                break;
            case 24:
                if ($sex === "Male") { return setWeightForAgeStatus(8.6, 8.7, 15.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.1, 8.2, 14.8, $weight); }
                break;
            case 25:
                if ($sex === "Male") { return setWeightForAgeStatus(8.8, 8.9, 15.5, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.2, 8.3, 15.1, $weight); }
                break;
            case 26:
                if ($sex === "Male") { return setWeightForAgeStatus(8.9, 9.0, 15.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.4, 8.5, 15.4, $weight); }
                break;
            case 27:
                if ($sex === "Male") { return setWeightForAgeStatus(9.0, 9.1, 16.1, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.5, 8.6, 15.7, $weight); }
                break;
            case 28:
                if ($sex === "Male") { return setWeightForAgeStatus(9.1, 9.2, 16.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.6, 8.7, 16.0, $weight); }
                break;
            case 29:
                if ($sex === "Male") { return setWeightForAgeStatus(9.2, 9.3, 16.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.8, 8.9, 16.4, $weight); }
                break;
            case 30:
                if ($sex === "Male") { return setWeightForAgeStatus(9.4, 9.5, 17.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(8.9, 9.0, 16.5, $weight); }
                break;
            case 31:
                if ($sex === "Male") { return setWeightForAgeStatus(9.5, 9.6, 17.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.0, 9.1, 16.8, $weight); }
                break;
            case 32:
                if ($sex === "Male") { return setWeightForAgeStatus(9.6, 9.7, 17.6, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.1, 9.2, 17.1, $weight); }
                break;
            case 33:
                if ($sex === "Male") { return setWeightForAgeStatus(9.7, 9.8, 17.6, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.3, 9.4, 17.3, $weight); }
                break;
            case 34:
                if ($sex === "Male") { return setWeightForAgeStatus(9.8, 9.9, 17.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.4, 9.5, 17.6, $weight); }
                break;
            case 35:
                if ($sex === "Male") { return setWeightForAgeStatus(9.9, 10.0, 18.1, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.5, 9.6, 17.9, $weight); }
                break;
            case 36:
                if ($sex === "Male") { return setWeightForAgeStatus(10.0, 10.1, 18.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.6, 9.7, 18.1, $weight); }
                break;
            case 37:
                if ($sex === "Male") { return setWeightForAgeStatus(10.1, 10.2, 18.6, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.7, 9.8, 18.4, $weight); }
                break;
            case 38:
                if ($sex === "Male") { return setWeightForAgeStatus(10.2, 10.3, 18.8, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.8, 9.9, 18.7, $weight); }
                break;
            case 39:
                if ($sex === "Male") { return setWeightForAgeStatus(10.3, 10.4, 19.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(9.9, 10.0, 19.0, $weight); }
                break;
            case 40:
                if ($sex === "Male") { return setWeightForAgeStatus(10.4, 10.5, 19.3, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.1, 10.2, 19.2, $weight); }
                break;
            case 41:
                if ($sex === "Male") { return setWeightForAgeStatus(10.5, 10.6, 19.5, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.2, 10.3, 19.5, $weight); }
                break;
            case 42:
                if ($sex === "Male") { return setWeightForAgeStatus(10.6, 10.7, 19.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.3, 10.4, 19.8, $weight); }
                break;
            case 43:
                if ($sex === "Male") { return setWeightForAgeStatus(10.7, 10.8, 20.0, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.4, 10.5, 20.1, $weight); }
                break;
            case 44:
                if ($sex === "Male") { return setWeightForAgeStatus(10.8, 10.9, 20.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.5, 10.6, 20.4, $weight); }
                break;
            case 45:
                if ($sex === "Male") { return setWeightForAgeStatus(10.9, 11.0, 20.5, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.6, 10.7, 20.7, $weight); }
                break;
            case 46:
                if ($sex === "Male") { return setWeightForAgeStatus(11.0, 11.1, 20.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.7, 10.8, 20.9, $weight); }
                break;
            case 47:
                if ($sex === "Male") { return setWeightForAgeStatus(11.1, 11.2, 20.9, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.8, 10.9, 21.2, $weight); }
                break;
            case 48:
                if ($sex === "Male") { return setWeightForAgeStatus(11.2, 11.3, 21.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(10.9, 11.0, 21.5, $weight); }
                break;
            case 49:
                if ($sex === "Male") { return setWeightForAgeStatus(11.3, 11.4, 21.4, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.0, 11.1, 21.8, $weight); }
                break;
            case 50:
                if ($sex === "Male") { return setWeightForAgeStatus(11.4, 11.5, 21.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.1, 11.2, 22.1, $weight); }
                break;
            case 51:
                if ($sex === "Male") { return setWeightForAgeStatus(11.5, 11.6, 21.9, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.2, 11.3, 22.4, $weight); }
                break;
            case 52:
                if ($sex === "Male") { return setWeightForAgeStatus(11.6, 11.7, 22.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.3, 11.4, 22.6, $weight); }
                break;
            case 53:
                if ($sex === "Male") { return setWeightForAgeStatus(11.7, 11.8, 22.4, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.4, 11.5, 22.9, $weight); }
                break;
            case 54:
                if ($sex === "Male") { return setWeightForAgeStatus(11.8, 11.9, 22.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.5, 11.6, 23.2, $weight); }
                break;
            case 55:
                if ($sex === "Male") { return setWeightForAgeStatus(11.9, 12.0, 22.9, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.6, 11.7, 23.5, $weight); }
                break;
            case 56:
                if ($sex === "Male") { return setWeightForAgeStatus(12.0, 12.1, 23.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.7, 11.8, 23.8, $weight); }
                break;
            case 57:
                if ($sex === "Male") { return setWeightForAgeStatus(12.1, 12.2, 23.4, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.8, 11.9, 24.1, $weight); }
                break;
            case 58:
                if ($sex === "Male") { return setWeightForAgeStatus(12.2, 12.3, 23.7, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(11.9, 12.0, 24.4, $weight); }
                break;
            case 59:
                if ($sex === "Male") { return setWeightForAgeStatus(12.3, 12.4, 23.9, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.0, 12.1, 24.6, $weight); }
                break;
            case 60:
                if ($sex === "Male") { return setWeightForAgeStatus(12.4, 12.5, 24.2, $weight); }
                else if ($sex === "Female") { return setWeightForAgeStatus(12.1, 12.2, 24.7, $weight); }
                break;
            default:
                return "Out of range";
        }
    }

    private function calculateHeightLengthForAgeStatus($ageInMonths, $sex, $height) {

        switch ($ageInMonths)
        {
            case 0:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(44.1, 44.2, 46.1, 53.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(43.5, 43.6, 45.4, 53.0, $height); }
                break;
            case 1:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(48.8, 48.9, 50.8, 58.7, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(47.7, 47.8, 49.8, 57.7, $height); }
                break;
            case 2:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(52.3, 52.4, 54.4, 62.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(50.9, 51.0, 53.0, 61.2, $height); }
                break;
            case 3:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(55.2, 55.3, 57.3, 65.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(53.4, 53.5, 55.6, 64.1, $height); }
                break;
            case 4:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(57.5, 57.6, 59.7, 68.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(55.5, 55.6, 57.8, 66.5, $height); }
                break;
            case 5:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(59.5, 59.6, 61.7, 70.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(57.3, 57.4, 59.6, 68.6, $height); }
                break;
            case 6:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(61.1, 61.2, 63.3, 72.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(58.8, 58.9, 61.2, 70.4, $height); }
                break;
            case 7:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(62.6, 62.7, 64.8, 73.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(60.2, 60.3, 62.7, 72.0, $height); }
                break;
            case 8:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(63.9, 64.0, 66.2, 75.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(61.6, 61.7, 64.0, 73.6, $height); }
                break;
            case 9:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(65.1, 65.2, 67.5, 76.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(62.8, 62.9, 65.3, 75.1, $height); }
                break;
            case 10:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(66.3, 66.4, 68.7, 78.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(64.0, 64.1, 66.5, 76.5, $height); }
                break;
            case 11:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(67.5, 67.6, 69.9, 79.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(65.1, 65.2, 67.7, 77.9, $height); }
                break;
            case 12:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(68.5, 68.6, 71.0, 80.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(66.2, 66.3, 68.9, 79.3, $height); }
                break;
            case 13:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(69.5, 69.6, 72.1, 81.9, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(67.2, 67.3, 70.0, 80.6, $height); }
                break;
            case 14:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(70.5, 70.6, 73.1, 83.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(68.2, 68.3, 71.0, 81.8, $height); }
                break;
            case 15:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(71.5, 71.6, 74.1, 84.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(69.2, 69.3, 72.0, 83.1, $height); }
                break;
            case 16:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(72.4, 72.5, 75.0, 85.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(70.1, 70.2, 73.0, 84.3, $height); }
                break;
            case 17:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(73.2, 73.3, 76.0, 86.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(71.0, 71.1, 74.0, 85.5, $height); }
                break;
            case 18:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(74.1, 74.2, 76.9, 87.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(71.9, 72.0, 74.9, 86.6, $height); }
                break;
            case 19:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(74.9, 75.0, 77.7, 88.9, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(72.7, 72.8, 75.8, 87.7, $height); }
                break;
            case 20:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(75.7, 75.8, 78.6, 89.9, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(73.6, 73.7, 76.7, 88.8, $height); }
                break;
            case 21:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(76.4, 76.5, 79.4, 91.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(74.4, 74.5, 77.5, 89.9, $height); }
                break;
            case 22:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(77.1, 77.2, 80.2, 92.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(75.1, 75.2, 78.4, 90.9, $height); }
                break;
            case 23:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(77.9, 78.0, 81.0, 93.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(75.9, 76.0, 79.2, 92.0, $height); }
                break;
            case 24:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(77.9, 78.0, 81.0, 93.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(75.9, 76.0, 79.3, 92.3, $height); }
                break;
            case 25:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(78.5, 78.6, 81.7, 94.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(76.7, 76.8, 80.0, 93.2, $height); }
                break;
            case 26:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(79.2, 79.3, 82.5, 95.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(77.4, 77.5, 80.8, 94.2, $height); }
                break;
            case 27:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(79.8, 79.9, 83.1, 96.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(78.0, 78.1, 81.5, 95.1, $height); }
                break;
            case 28:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(80.4, 80.5, 83.8, 97.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(78.7, 78.8, 82.2, 96.1, $height); }
                break;
            case 29:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(81.0, 81.1, 84.5, 98.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(79.4, 79.5, 82.9, 97.0, $height); }
                break;
            case 30:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(81.6, 81.7, 85.1, 98.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(80.0, 80.1, 83.6, 97.8, $height); }
                break;
            case 31:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(82.2, 82.3, 85.7, 99.7, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(80.6, 80.7, 84.3, 98.7, $height); }
                break;
            case 32:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(82.7, 82.8, 86.4, 100.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(81.2, 81.3, 84.9, 99.5, $height); }
                break;
            case 33:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(83.3, 83.4, 86.9, 101.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(81.8, 81.9, 85.6, 100.4, $height); }
                break;
            case 34:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(83.8, 83.9, 87.5, 102.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(82.4, 82.5, 86.2, 101.2, $height); }
                break;
            case 35:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(84.3, 84.4, 88.1, 102.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(83.0, 83.1, 86.8, 102.0, $height); }
                break;
            case 36:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(84.9, 85.0, 88.7, 103.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(83.5, 83.6, 87.4, 102.8, $height); }
                break;
            case 37:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(85.4, 85.5, 89.2, 104.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(84.1, 84.2, 88.0, 103.5, $height); }
                break;
            case 38:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(85.9, 86.0, 89.8, 105.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(84.6, 84.7, 88.6, 104.3, $height); }
                break;
            case 39:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(86.4, 86.5, 90.3, 105.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(85.2, 85.3, 89.2, 105.1, $height); }
                break;
            case 40:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(86.9, 87.0, 90.9, 106.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(85.7, 85.8, 89.8, 105.8, $height); }
                break;
            case 41:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(87.4, 87.5, 91.4, 107.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(86.2, 86.3, 90.4, 106.5, $height); }
                break;
            case 42:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(87.9, 88.0, 91.9, 107.9, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(86.7, 86.8, 90.9, 107.3, $height); }
                break;
            case 43:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(88.3, 88.4, 92.4, 108.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(87.3, 87.4, 91.5, 108.0, $height); }
                break;
            case 44:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(88.8, 88.9, 93.0, 109.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(87.8, 87.9, 92.0, 108.7, $height); }
                break;
            case 45:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(89.3, 89.4, 93.4, 109.9, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(88.3, 88.4, 92.5, 109.4, $height); }
                break;
            case 46:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(89.7, 89.8, 93.9, 110.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(88.8, 88.9, 93.1, 110.1, $height); }
                break;
            case 47:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(90.2, 90.3, 94.3, 111.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(89.2, 89.3, 93.6, 110.8, $height); }
                break;
            case 48:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(90.6, 90.7, 94.9, 111.8, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(89.7, 89.8, 94.1, 111.4, $height); }
                break;
            case 49:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(91.1, 91.2, 95.4, 112.5, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(90.2, 90.3, 94.6, 112.1, $height); }
                break;
            case 50:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(91.5, 91.6, 95.9, 113.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(90.6, 90.7, 95.1, 112.8, $height); }
                break;
            case 51:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(92.0, 92.1, 96.4, 113.7, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(91.1, 91.2, 95.6, 113.4, $height); }
                break;
            case 52:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(92.4, 92.5, 96.9, 114.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(91.6, 91.7, 96.1, 114.1, $height); }
                break;
            case 53:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(92.9, 93.0, 97.4, 115.0, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(92.0, 92.1, 96.6, 114.7, $height); }
                break;
            case 54:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(93.3, 93.4, 97.8, 115.6, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(92.5, 92.6, 97.1, 115.3, $height); }
                break;
            case 55:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(93.8, 93.9, 98.3, 116.2, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(92.9, 93.0, 97.6, 116.0, $height); }
                break;
            case 56:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(94.2, 94.3, 98.8, 116.8, $height);} 
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(93.3, 93.4, 98.1, 116.6, $height);}
                break;
            case 57:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(94.6, 94.7, 99.3, 117.5, $height);} 
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(93.8, 93.9, 98.5, 117.2, $height);}
                break;
            case 58:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(95.1, 95.2, 99.7, 118.1, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(94.2, 94.3, 99.0, 117.8, $height); }
                break;
            case 59:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(95.5, 95.6, 100.2, 118.7, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(94.6, 94.7, 99.5, 118.4, $height); }
                break;                     
            case 60:
                if ($sex === "Male") { return setHeightLengthForAgeStatus(96.0, 96.1, 100.7, 119.3, $height); }
                else if ($sex === "Female") { return setHeightLengthForAgeStatus(95.1, 95.2, 99.9, 119.0, $height); }
                break;
            default:
                return "Out of range";
        }
    }

    private function calculateWgtHtstatus($height, $ageInMonths, $weight, $sex) {
        list($childHeight, $childHeightIndex) = roundOfHeight($height, $ageInMonths);
        $matrix = getLimits($ageInMonths, $sex);
        $matrix = $matrix[$childHeightIndex];
        $height = $childHeight;
        return setWgtHtStatus($matrix[0], $matrix[1], $matrix[2], $matrix[3], $matrix[4], $weight);
    }

    public function startRow(): int
    {
        return 2; // Assuming header is in the first row and data starts from the second row.
    }
}

function setWeightForAgeStatus($severelyUnderweightLimit, $underweightLimit, $normalLimit, $weight) {
    if ($weight <= $severelyUnderweightLimit) { 
        return "Severely Underweight"; 
    } else if ($weight >= $underweightLimit && $weight <= $normalLimit) { 
        return "Underweight"; 
    } else if ($weight > $normalLimit) { 
        return "Normal"; 
    }
}

function setHeightLengthForAgeStatus($severelyStuntedLimit, $stuntedLimit, $normalLimit, $tallLimit, $height) {
    if ($height <= $severelyStuntedLimit) { 
        return "Severely Stunted"; 
    } else if ($height >= $stuntedLimit && $height <= $normalLimit) { 
        return "Stunted"; 
    } else if ($height >= $normalLimit && $height <= $tallLimit) { 
        return "Normal"; 
    } else if ($height > $tallLimit) { 
        return "Tall"; 
    }
}


function setWgtHtStatus($SevereAcuteMalnutrition, $ModerateAcuteMalnutrition, $Normal, $Overweight, $Obese, $weight) {
    if ($weight <= $SevereAcuteMalnutrition){
        return "Severe Acute Malnutrition";
    } else if ($weight > $SevereAcuteMalnutrition && $weight <= $ModerateAcuteMalnutrition){
        return "Moderate Acute Malnutrition";
    } else if ($weight > $ModerateAcuteMalnutrition && $weight <= $Normal) {
        return "Normal";
    } else if ($weight > $Normal && $weight <= $Overweight){
        return "Overweight";
    } else if ($weight > $Overweight && $weight <= $Obese || $weight > $Obese){
        return "Obese";
    } else {
        return "Out of Rangesasdasdasdasda";
    }
}

function roundOfHeight($height, $ageInMonths) {
    $matrheightCategories23 = [
        45.0, 45.5, 46.0, 46.5, 47.0, 47.5, 48.0, 48.5, 49.0, 49.5, 50.0, 50.5, 51.0, 51.5, 52.0, 52.5, 53.0, 53.5, 54.0, 54.5, 55.0, 55.5, 56.0, 56.5,
        57.0, 57.5, 58.0, 58.5, 59.0, 59.5, 60.0, 60.5, 61.0, 61.5, 62.0, 62.5, 63.0, 63.5, 64.0, 64.5, 65.0, 65.5, 66.0, 66.5, 67.0, 67.5, 68.0, 68.5,
        69.0, 69.5, 70.0, 70.5, 71.0, 71.5, 72.0, 72.5, 73.0, 73.5, 74.0, 74.5, 75.0, 75.5, 76.0, 76.5, 77.0, 77.5, 78.0, 78.5, 79.0, 79.5, 80.0, 80.5,
        81.0, 81.5, 82.0, 82.5, 83.0, 83.5, 84.0, 84.5, 85.0, 85.5, 86.0, 86.5, 87.0, 87.5, 88.0, 88.5, 89.0, 89.5, 90.0, 90.5, 91.0, 91.5, 92.0, 92.5,
        93.0, 93.5, 94.0, 94.5, 95.0, 95.5, 96.0, 96.5, 97.0, 97.5, 98.0, 98.5, 99.0, 99.5, 100.0, 100.5, 101.0, 101.5, 102.0, 102.5, 103.0, 103.5, 104.0,
        104.5, 105.0, 105.5, 106.0, 106.5, 107.0, 107.5, 108.0, 108.5, 109.0, 109.5, 110.0
    ];
    $matrheightCategories60 = [
        65.0, 65.5, 66.0, 66.5, 67.0, 67.5, 68.0, 68.5, 69.0, 69.5, 70.0, 70.5, 71.0, 71.5, 72.0, 72.5, 73.0, 73.5, 74.0, 74.5, 75.0, 75.5, 76.0, 76.5,
        77.0, 77.5, 78.0, 78.5, 79.0, 79.5, 80.0, 80.5, 81.0, 81.5, 82.0, 82.5, 83.0, 83.5, 84.0, 84.5, 85.0, 85.5, 86.0, 86.5, 87.0, 87.5, 88.0, 88.5,
        89.0, 89.5, 90.0, 90.5, 91.0, 91.5, 92.0, 92.5, 93.0, 93.5, 94.0, 94.5, 95.0, 95.5, 96.0, 96.5, 97.0, 97.5, 98.0, 98.5, 99.0, 99.5, 100.0, 100.5,
        101.0, 101.5, 102.0, 102.5, 103.0, 103.5, 104.0, 104.5, 105.0, 105.5, 106.0, 106.5, 107.0, 107.5, 108.0, 108.5, 109.0, 109.5, 110.0, 110.5, 111.0,
        111.5, 112.0, 112.5, 113.0, 113.5, 114.0, 114.5, 115.0, 115.5, 116.0, 116.5, 117.0, 117.5, 118.0, 118.5, 119.0, 119.5, 120.0, 120.5, 121.0, 121.5,
        122.0, 122.5, 123.0, 123.5, 124.0, 124.5, 125.0, 125.5, 126.0, 126.5, 127.0, 127.5, 128.0, 128.5, 129.0, 129.5, 130.0
    ];
    
	if ($ageInMonths >= 0 && $ageInMonths <= 22) {
        $matrix = $matrheightCategories23;
    } else {
        $matrix = $matrheightCategories60;
    }
    
        $category = null;
    foreach ($matrix as $cat) {
        if ($height < $cat) {
            $category = $cat;
            break;
        }
    }

    $finalHeight = 0.0;

    if ($category !== null) {
        $index = array_search($category, $matrix);
        if ($height - $matrix[$index - 1] <= $matrix[$index] - $height) {
            $finalHeight = $matrix[$index - 1];
        } else {
            $finalHeight = $matrix[$index];
        }
    } else {
        $finalHeight = end($matrix);
    }

    return [$finalHeight, array_search($finalHeight, $matrix)];
}


function getLimits ($ageInMonths, $sex){
    $matrix = array();
    $limits23 = [
        'Male' => [
            [1.8, 1.9, 3, 3.3, 3.4], [1.8, 2, 3.1, 3.4, 3.5], [1.9, 2.1, 3.1, 3.5, 3.6], [2, 2.2, 3.2, 3.6, 3.7],
            [2, 2.2, 3.3, 3.7, 3.8], [2.1, 2.3, 3.4, 3.8, 3.9], [2.2, 2.4, 3.6, 3.9, 4], [2.2, 2.5, 3.7, 4, 4.1],
            [2.3, 2.5, 3.8, 4.2, 4.3], [2.4, 2.6, 3.9, 4.3, 4.4], [2.5, 2.7, 4, 4.4, 4.5], [2.6, 2.8, 4.1, 4.5, 4.6],
            [2.6, 2.9, 4.2, 4.7, 4.8], [2.7, 3, 4.4, 4.8, 4.9], [2.8, 3.1, 4.5, 5, 5.1], [2.9, 3.2, 4.6, 5.1, 5.2],
            [3, 3.3, 4.8, 5.3, 5.4], [3.1, 3.4, 4.9, 5.4, 5.5], [3.2, 3.5, 5.1, 5.6, 5.7], [3.3, 3.6, 5.3, 5.8, 5.9],
            [3.5, 3.7, 5.4, 6, 6.1], [3.6, 3.9, 5.6, 6.1, 6.2], [3.7, 4, 5.8, 6.3, 6.4], [3.8, 4.1, 5.9, 6.5, 6.6],
            [3.9, 4.2, 6.1, 6.7, 6.8], [4, 4.4, 6.3, 6.9, 7], [4.2, 4.5, 6.4, 7.1, 7.2], [4.3, 4.6, 6.6, 7.2, 7.3],
            [4.4, 4.7, 6.8, 7.4, 7.5], [4.5, 4.9, 7, 7.6, 7.7], [4.6, 5, 7.1, 7.8, 7.9], [4.7, 5.1, 7.3, 8, 8.1],
            [4.8, 5.2, 7.4, 8.1, 8.2], [4.9, 5.3, 7.6, 8.3, 8.4], [5, 5.5, 7.7, 8.5, 836], [5.1, 5.6, 7.9, 8.6, 8.7],
            [5.2, 5.7, 8, 8.8, 8.9], [5.3, 5.8, 8.2, 8.9, 9], [5.4, 5.9, 8.3, 9.1, 9.2], [5.5, 6, 8.5, 9.3, 9.4],
            [5.6, 6.1, 8.6, 9.4, 9.5], [5.7, 6.2, 8.7, 9.6, 9.7], [5.8, 6.3, 8.9, 9.7, 9.8], [5.9, 6.4, 9, 9.9, 10],
            [6, 6.5, 9.2, 10, 10.1], [6.1, 6.6, 9.3, 10.2, 10.3], [6.2, 6.7, 9.4, 10.3, 10.4], [6.3, 6.8, 9.6, 10.5, 10.6],
            [6.4, 6.9, 9.7, 10.6, 10.7], [6.5, 7, 9.8, 10.8, 10.9], [6.5, 7.1, 10, 10.9, 11], [6.6, 7.2, 10.1, 11.1, 11.2],
            [6.7, 7.3, 10.2, 11.2, 11.3], [6.8, 7.4, 10.4, 11.3, 11.4], [6.9, 7.5, 10.5, 11.5, 11.6], [7, 7.5, 10.6, 11.6, 11.7],
            [7.1, 7.6, 10.8, 11.8, 11.9], [7.1, 7.7, 10.9, 11.9, 12], [7.2, 7.8, 11, 12.1, 12.2], [7.3, 7.9, 11.2, 12.2, 12.3],
            [7.4, 8, 11.3, 12.3, 12.4], [7.5, 8.1, 11.4, 12.5, 12.6], [7.5, 8.2, 11.5, 12.6, 12.7], [7.6, 8.2, 11.6, 12.7, 12.8],
            [7.7, 8.3, 11.7, 12.8, 12.9], [7.8, 8.4, 11.9, 13, 13.1], [7.8, 8.5, 12, 13.1, 13.2], [7.9, 8.6, 12.1, 13.2, 13.3],
            [8, 8.6, 12.2, 13.3, 13.4], [8.1, 8.7, 12.3, 13.4, 13.5], [8.1, 8.8, 12.4, 13.6, 13.7], [8.2, 8.9, 12.5, 13.7, 13.8],
            [8.3, 9, 12.6, 13.8, 13.9], [8.4, 9, 12.7, 13.9, 14], [8.4, 9.1, 12.8, 14, 14.1], [8.5, 9.2, 13, 14.2, 14.3],
            [8.6, 9.3, 13.1, 14.3, 14.4], [8.7, 9.4, 13.2, 14.4, 14.5], [8.8, 9.5, 13.3, 14.6, 14.7], [8.9, 9.6, 13.5, 14.7, 14.8],
            [9, 9.7, 13.6, 14.9, 15], [9.1, 9.8, 13.7, 15, 15.1], [9.2, 9.9, 13.9, 15.2, 15.3], [9.3, 10, 14, 15.3, 15.4],
            [9.4, 10.1, 14.2, 15.5, 15.6], [9.5, 10.3, 14.3, 15.6, 15.7], [9.6, 10.4, 14.5, 15.8, 15.9], [9.7, 10.5, 14.6, 15.9, 16],
            [9.8, 10.6, 14.7, 16.1, 16.2], [9.9, 10.7, 14.9, 16.2, 16.3], [10, 10.8, 15, 16.4, 16.5], [10.1, 10.9, 15.1, 16.5, 16.6],
            [10.2, 11, 15.3, 16.7, 16.8], [10.3, 11.1, 15.4, 16.8, 16.9], [10.4, 11.2, 15.6, 17, 17.1], [10.5, 11.3, 15.7, 17.1, 17.2],
            [10.6, 11.4, 15.8, 17.3, 17.4], [10.6, 11.5, 16, 17.4, 17.5], [10.7, 11.6, 16.1, 17.6, 17.7], [10.8, 11.7, 16.3, 17.7, 17.8],
            [10.9, 11, 16.4, 17.9, 18], [11, 11.9, 16.5, 18, 18.1], [11.1, 12, 16.7, 18.2, 18.3], [11.2, 12.1, 16.8, 18.4, 18.5],
            [11.3, 12.2, 17, 18.5, 18.6], [11.4, 12.3, 17.1, 18.7, 18.8], [11.5, 12.4, 17.3, 18.9, 19], [11.6, 12.5, 17.5, 19.1, 19.2],
            [11.7, 12.6, 17.6, 19.2, 19.3], [11.8, 12.7, 17.8, 19.4, 19.5], [11.9, 12.8, 18, 19.6, 19.7], [12, 12.9, 18.1, 19.8, 19.9],
            [12.1, 13.1, 18.3, 20, 20.1], [12.2, 13.2, 18.5, 20.2, 20.3], [12.3, 13.3, 18.7, 20.4, 20.5], [12.4, 13.4, 18.8, 20.6, 20.7],
            [12.5, 13.5, 19, 20.8, 20.9], [12.6, 13.6, 19.2, 21, 21.1], [12.7, 13.8, 19.4, 21.2, 21.3], [12.8, 13.9, 19.6, 21.5, 21.6],
            [12.9, 14, 19.8, 21.7, 21.8], [13.1, 14.1, 20, 21.9, 22], [13.2, 14.3, 20.2, 22.1, 22.2], [13.3, 14.4, 20.4, 22.4, 22.5],
            [13.4, 14.5, 20.6, 22.6, 22.7], [13.5, 14.6, 20.8, 22.8, 22.9], [13.6, 14.8, 21, 23.1, 23.2], [13.7, 14.9, 21.2, 23.3, 23.4],
            [13.9, 15, 21.4, 23.6, 23.7], [14, 15.2, 21.7, 23.8, 23.9], [14.1, 15.3, 21.9, 24.1, 24.2]
        ],
        'Female' => [
            [1.8, 2, 3, 3.3, 3.4], [1.9, 2, 3.1, 3.4, 3.5], [1.9, 2.1, 3.2, 3.5, 3.6], [2, 2.2, 3.3, 3.6, 3.7],
            [2.1, 2.3, 3.4, 3.7, 3.8], [2.1, 2.3, 3.5, 3.8, 3.9], [2.2, 2.4, 3.6, 4, 4.1], [2.3, 2.5, 3.7, 4.1, 4.2],
            [2.3, 2.5, 3.8, 4.2, 4.3], [2.4, 2.6, 3.9, 4.3, 4.4], [2.5, 2.7, 4, 4.5, 4.6], [2.6, 2.8, 4.2, 4.6, 4.7],
            [2.7, 2.9, 4.3, 4.8, 4.9], [2.7, 3, 4.4, 4.9, 5], [2.8, 3.1, 4.6, 5.1, 5.2], [2.9, 3.2, 4.7, 5.2, 5.3],
            [3, 3.3, 4.9, 5.4, 5.5], [3.1, 3.4, 50, 55, 5.6], [3.2, 3.6, 5.2, 5.7, 5.8], [3.3, 3.6, 5.3, 5.9, 6],
            [3.4, 3.7, 5.5, 6.1, 6.2], [3.5, 3.8, 5.7, 6.3, 6.4], [3.6, 3.9, 5.8, 6.4, 6.5], [3.7, 4, 6, 6.6, 6.7],
            [3.8, 4.2, 6.1, 6.8, 6.9], [3.9, 4.3, 6.3, 7, 7.1], [4, 4.4, 6.5, 7.1, 7.2], [4.1, 4.5, 6.6, 7.3, 7.4],
            [4.2, 4.6, 6.8, 7.5, 7.6], [4.3, 4.7, 6.9, 7.7, 7.8], [4.4, 4.8, 7.1, 7.8, 7.9], [4.5, 4.9, 7.3, 8, 8.1],
            [4.6, 5, 7.4, 8.2, 8.3], [4.7, 5.1, 7.6, 8.4, 8.5], [4.8, 5.2, 7.7, 8.5, 8.6], [4.9, 5.3, 7.8, 8.7, 8.8],
            [5, 5.4, 8, 8.8, 8.9], [5.1, 5.5, 8.1, 9.0, 9.1], [5.2, 5.6, 8.3, 9.1, 9.2], [5.3, 5.7, 8.4, 9.3, 9.4],
            [5.4, 5.8, 8.6, 9.5, 9.6], [5.4, 5.9, 8.7, 9.6, 9.7], [5.5, 6, 8.8, 9.8, 9.9], [5.6, 6.1, 9, 9.9, 10],
            [5.7, 6.2, 9.1, 10, 10.1], [5.8, 6.3, 9.2, 10.2, 10.3], [5.9, 6.4, 9.4, 10.3, 10.4], [6, 6.5, 9.5, 10.5, 10.6],
            [6, 6.6, 9.6, 10.6, 10.7], [6.1, 6.7, 9.7, 10.7, 10.8], [6.2, 6.8, 9.9, 10.9, 11], [6.3, 6.8, 10, 11, 11.1],
            [6.4, 6.9, 10.1, 11.1, 11.2], [6.4, 7, 10.2, 11.3, 11.4], [6.5, 7.1, 10.3, 11.4, 11.5], [6.6, 7.2, 10.5, 11.5, 11.6],
            [6.7, 7.3, 10.6, 11.7, 11.8], [6.8, 7.3, 10.7, 11.8, 11.9], [6.8, 7.4, 10.8, 11.9, 12], [6.9, 7.5, 10.9, 12, 12.1],
            [7, 7.6, 11, 12.2, 12.3], [7, 7.7, 11.1, 12.3, 12.4], [7.1, 7.7, 11.2, 12.4, 12.5], [7.2, 7.8, 11.4, 12.5, 12.6],
            [7.3, 7.9, 11.5, 12.6, 12.7], [7.3, 8, 11.6, 12.8, 12.9], [7.4, 8.1, 11.7, 12.9, 13], [7.5, 8.1, 11.8, 13, 13.1],
            [7.6, 8.2, 11.9, 13.1, 13.2], [7.6, 8.3, 12, 13.3, 13.4], [7.7, 8.4, 12.1, 13.4, 13.5], [7.8, 8.5, 12.3, 13.5, 13.6],
            [7.9, 8.6, 12.4, 13.7, 13.8], [8, 8.7, 12.5, 13.8, 13.9], [8, 8.7, 12.6, 13.9, 14], [8.1, 8.8, 12.8, 14.1, 14.2],
            [8.2, 8.9, 12.9, 14.2, 14.3], [8.3, 9, 13.1, 14.4, 14.5], [8.4, 9.1, 13.2, 14.5, 14.6], [8.5, 9.2, 13.3, 14.7, 14.8],
            [8.6, 9.3, 13.5, 14.9, 15], [8.7, 9.4, 13.6, 15.0, 15.1], [8.8, 9.6, 13.8, 15.2, 15.3], [8.9, 9.7, 13.9, 15.4, 15.5],
            [9, 9.8, 14.1, 15.5, 15.6], [9.1, 9.9, 14.2, 15.7, 15.8], [9.2, 10, 14.4, 15.9, 16], [9.3, 10.1, 14.5, 16, 16.1],
            [9.4, 10.2, 14.7, 16.2, 16.3], [9.5, 10.3, 14.8, 16.4, 16.5], [9.6, 10.4, 15, 16.5, 16.6], [9.7, 10.5, 15.1, 16.7, 16.8],
            [9.8, 10.6, 15.3, 16.9, 17], [9.9, 10.7, 15.5, 17, 17.1], [10, 10.8, 15.6, 17.2, 17.3], [10, 10.9, 15.8, 17.4, 17.5],
            [10.1, 11, 15.9, 17.5, 17.6], [10.2, 11.1, 16.1, 17.7, 17.8], [10.3, 11.2, 16.2, 17.9, 18], [10.4, 11.3, 16.4, 18, 18.1],
            [10.5, 11.4, 16.5, 18.2, 18.3], [10.6, 11.5, 16.7, 18.4, 18.5], [10.7, 11.6, 16.8, 18.6, 18.7], [10.8, 11.7, 17, 18.7, 18.8],
            [10.9, 11.9, 17.1, 18.9, 19], [11, 12, 17.3, 19.1, 19.2], [11.1, 12.1, 17.5, 19.3, 19.4], [11.2, 12.2, 17.6, 19.5, 19.6],
            [11.3, 12.3, 17.8, 19.6, 19.7], [11.4, 12.4, 18, 19.8, 19.9], [11.5, 12.5, 18.1, 20, 20.1], [11.6, 12.6, 18.3, 20.2, 20.3],
            [11.7, 12.7, 18.5, 20.4, 20.5], [11.8, 12.9, 18.7, 20.6, 20.7], [11.9, 13, 18.9, 20.8, 20.9], [12, 13.1, 19, 21, 21.1],
            [12.2, 13.2, 19.2, 21.3, 21.4], [12.3, 13.4, 19.4, 21.5, 21.6], [12.4, 13.5, 19.6, 21.7, 21.8], [12.5, 13.6, 19.8, 21.9, 22],
            [12.6, 13.7, 20, 22.2, 22.3], [12.7, 13.9, 20.2, 22.4, 22.5], [12.9, 14, 20.5, 22.6, 22.7], [13, 14.2, 20.7, 22.9, 23],
            [13.1, 14.3, 20.9, 23.1, 23.2], [13.2, 14.4, 21.1, 23.4, 23.5], [13.4, 14.6, 21.3, 23.6, 23.7], [13.5, 14.7, 21.6, 23.9, 24],
            [13.6, 14.9, 21.8, 24.2, 24.3], [13.8, 15, 22, 24.4, 24.5], [13.9, 15.2, 22.3, 24.7, 24.8]
        ]
    ];
    $limits60 = [
        'Male' => [
            [5.8, 6.2, 8.8, 9.6, 9.7], [5.9, 6.3, 8.9, 9.8, 9.9], [6.0, 6.4, 9.1, 9.9, 10.0], [6.0, 6.5, 9.2, 10.1, 10.2],
            [6.1, 6.6, 9.4, 10.2, 10.3], [6.2, 6.7, 9.5, 10.4, 10.5], [6.3, 6.8, 9.6, 10.5, 10.6], [6.4, 6.9, 9.8, 10.7, 10.8],
            [6.5, 7.0, 9.9, 10.8, 10.9], [6.6, 7.1, 10.0, 11.0, 11.1], [6.7, 7.2, 10.2, 11.1, 11.2], [6.8, 7.3, 10.3, 11.3, 11.4],
            [6.8, 7.4, 10.4, 11.4, 11.5], [6.9, 7.5, 10.6, 11.6, 11.7], [7.0, 7.6, 10.7, 11.7, 11.8], [7.1, 7.7, 10.8, 11.8, 11.9],
            [7.2, 7.8, 11.0, 12.0, 12.1], [7.3, 7.8, 11.1, 12.1, 12.2], [7.3, 7.9, 11.2, 12.2, 12.3], [7.4, 8.0, 11.3, 12.4, 12.5],
            [7.5, 8.1, 11.4, 12.5, 12.6], [7.6, 8.2, 11.6, 12.6, 12.7], [7.6, 8.3, 11.7, 12.8, 12.9], [7.7, 8.4, 11.8, 12.9, 13.0],
            [7.8, 8.4, 11.9, 13.0, 13.1], [7.9, 8.5, 12.0, 13.1, 13.2], [8.0, 8.6, 12.1, 13.3, 114], [8.0, 8.7, 12.2, 13.4, 13.5],
            [8.1, 8.7, 12.3, 13.5, 13.6], [8.2, 8.8, 12.4, 13.6, 13.7], [8.2, 8.9, 12.6, 13.7, 13.8], [8.3, 9.0, 12.7, 13.8, 13.9],
            [8.4, 9.1, 12.8, 14.0, 14.1], [8.5, 9.2, 12.9, 14.1, 14.2], [8.6, 9.2, 13.0, 14.2, 14.3], [8.6, 9.3, 13.1, 14.4, 14.5],
            [8.7, 9.4, 13.3, 14.5, 14.6], [8.8, 9.5, 13.4, 14.6, 14.7], [8.9, 9.6, 13.5, 14.8, 14.9], [9.0, 9.8, 13.7, 14.9, 15.0],
            [9.1, 9.9, 13.8, 15.1, 15.2], [9.2, 10.0, 13.9, 15.2, 15.3], [9.3, 10.1, 14.1, 15.4, 15.5], [9.4, 10.2, 14.2, 15.5, 15.6],
            [9.5, 10.3, 14.4, 15.7, 15.8], [9.6, 10.4, 14.5, 15.8, 15.9], [9.7, 10.5, 14.7, 16.0, 16.1], [9.8, 10.6, 14.8, 16.1, 16.2],
            [9.9, 10.7, 14.9, 16.3, 16.4], [10.0, 10.8, 15.1, 16.4, 16.5], [10.1, 10.9, 15.2, 16.6, 16.7], [10.2, 11.0, 15.3, 16.7, 16.8],
            [10.3, 11.1, 15.5, 16.9, 17.0], [10.4, 11.2, 15.6, 17.0, 17.1], [10.5, 11.3, 15.8, 17.2, 17.3], [10.6, 11.4, 15.9, 17.3, 17.4],
            [10.7, 11.5, 16.0, 17.5, 17.6], [10.8, 11.6, 16.2, 17.6, 17.7], [10.9, 11.7, 16.3, 17.8, 17.9], [11.0, 11.8, 16.5, 17.9, 18.0],
            [11.0, 11.9, 16.6, 18.1, 18.2], [11.1, 12.0, 16.7, 18.3, 18.4], [11.2, 12.1, 16.9, 18.4, 18.5], [11.3, 12.2, 17.0, 18.6, 18.7],
            [11.4, 12.3, 17.2, 18.8, 18.9], [11.5, 12.4, 17.4, 18.9, 19.0], [11.6, 12.5, 17.5, 19.1, 19.2], [11.7, 12.7, 17.7, 19.3, 19.4],
            [11.8, 12.8, 17.9, 19.5, 19.6], [11.9, 12.9, 18.0, 19.7, 19.8], [12.0, 13.0, 18.2, 19.9, 20.0], [12.1, 13.1, 18.4, 20.1, 20.2],
            [12.2, 13.2, 18.5, 20.3, 20.4], [12.3, 13.3, 18.7, 20.5, 20.6], [12.4, 13.5, 18.9, 20.7, 20.8], [12.5, 13.6, 19.1, 20.9, 21.0],
            [12.7, 13.7, 19.3, 21.1, 21.2], [12.8, 13.8, 19.5, 21.3, 21.4], [12.9, 13.9, 19.7, 21.6, 21.7], [13.0, 14.1, 19.9, 21.8, 21.9],
            [13.1, 14.2, 20.1, 22.0, 22.1], [13.2, 14.3, 20.3, 22.2, 22.3], [13.3, 14.4, 20.5, 22.5, 22.6], [13.4, 14.6, 20.7, 22.7, 22.8],
            [13.6, 14.7, 20.9, 22.9, 23.0], [13.7, 14.8, 21.1, 23.2, 23.3], [13.8, 15.0, 21.3, 23.4, 23.5], [13.9, 15.1, 21.5, 23.7, 23.8],
            [14.0, 15.2, 21.8, 23.9, 24.0], [14.2, 15.4, 22.0, 24.2, 24.3], [14.3, 15.5, 22.2, 24.4, 24.5], [14.4, 15.7, 22.4, 24.7, 24.8],
            [14.5, 15.8, 22.7, 25.0, 25.1], [14.7, 15.9, 22.9, 25.2, 25.3], [14.8, 16.1, 23.1, 25.5, 25.6], [14.9, 16.2, 23.4, 25.8, 25.9],
            [15.1, 16.4, 23.6, 26.0, 26.1], [15.2, 16.5, 23.9, 26.3, 26.4], [15.3, 16.7, 24.1, 26.6, 26.7], [15.5, 16.8, 24.4, 26.9, 27.0],
            [15.6, 17.0, 24.6, 27.2, 27.3], [15.7, 17.1, 24.9, 27.5, 27.6], [15.9, 17.3, 25.1, 27.8, 27.9], [16.0, 17.4, 25.4, 28.0, 28.1],
            [16.1, 17.6, 25.6, 28.3, 28.4], [16.3, 17.8, 25.9, 28.6, 28.7], [16.4, 17.9, 26.1, 28.9, 29.0], [16.6, 18.1, 26.4, 29.2, 29.3],
            [16.7, 18.2, 26.6, 29.5, 29.6], [16.8, 18.4, 26.9, 29.8, 29.9], [17.0, 18.5, 27.2, 30.1, 30.2]
        ],
        'Female' => [
            [5.5, 6, 8.7, 9.7, 9.8], [5.6, 6.1, 8.9, 9.8, 9.9], [5.7, 6.2, 9, 10, 10.1], [5.7, 6.3, 9.1, 10.1, 10.2],
            [5.8, 6.3, 9.3, 10.2, 10.3], [5.9, 6.4, 9.4, 10.4, 10.5], [6, 6.5, 9.5, 10.5, 10.6], [6.1, 6.6, 9.7, 10.7, 10.8],
            [6.2, 6.7, 9.8, 10.8, 10.9], [6.2, 6.8, 9.9, 10.9, 11], [6.3, 6.9, 10, 11.1, 11.2], [6.4, 7, 10.1, 11.2, 11.3],
            [6.5, 7, 10.3, 11.3, 11.4], [6.6, 7.1, 10.4, 11.5, 11.6], [6.6, 7.2, 10.5, 11.6, 11.7], [6.7, 7.3, 10.6, 11.7, 11.8],
            [6.8, 7.4, 10.7, 11.8, 11.9], [6.9, 7.5, 10.8, 12, 12.1], [6.9, 7.5, 11, 12.1, 12.2], [7, 7.6, 11.1, 12.2, 12.3],
            [7.1, 7.7, 11.2, 12.3, 12.4], [7.1, 7.8, 11.3, 12.5, 12.6], [7.2, 7.9, 11.4, 12.6, 12.7], [7.3, 7.9, 11.5, 12.7, 12.8],
            [7.4, 8, 11.6, 12.8, 12.9], [7.4, 8.1, 11.7, 12.9, 13], [7.5, 8.2, 11.8, 13.1, 13.2], [7.6, 8.3, 12, 13.2, 13.3],
            [7.7, 8.3, 12.1, 13.3, 13.4], [7.7, 8.4, 12.2, 13.4, 13.5], [7.8, 8.5, 12.3, 13.6, 13.7], [7.9, 8.6, 12.4, 13.7, 138],
            [8, 8.7, 12.6, 13.9, 14], [8.1, 8.8, 12.7, 14, 14.1], [8.2, 8.9, 12.8, 14.1, 14.2], [8.3, 9, 13, 14.3, 14.4],
            [8.4, 9.1, 13.1, 14.5, 14.6], [8.4, 9.2, 13.3, 14.6, 14.7], [8.5, 9.3, 13.4, 14.8, 14.9], [8.6, 9.4, 13.5, 14.9, 15],
            [8.7, 9.5, 13.7, 15.1, 15.2], [8.8, 9.6, 13.8, 15.3, 15.4], [8.9, 9.7, 14, 15.4, 15.5], [9, 9.8, 14.2, 15.6, 15.7],
            [9.1, 9.9, 14.3, 15.8, 15.9], [9.2, 10, 14.5, 15.9, 16], [9.3, 10.1, 14.6, 16.1, 16.2], [9.4, 10.2, 14.8, 16.3, 16.4],
            [9.5, 10.3, 14.9, 16.4, 16.5], [9.6, 10.4, 15.1, 16.6, 16.7], [9.7, 10.5, 15.2, 16.8, 16.9], [9.8, 10.6, 15.4, 16.9, 17],
            [9.9, 10.8, 15.5, 17.1, 17.2], [10, 10.9, 15.7, 17.3, 17.4], [10.1, 11, 15.8, 17.4, 17.5], [10.2, 11.1, 16, 17.6, 17.7],
            [10.3, 11.2, 16.1, 17.8, 17.9], [10.4, 11.3, 16.3, 17.9, 18], [10.5, 11.4, 16.4, 18.1, 18.2], [10.6, 11.5, 16.6, 18.3, 18.4],
            [10.7, 11.6, 16.7, 18.5, 18.6], [10.7, 11.7, 16.9, 18.6, 18.7], [10.8, 11.8, 17, 18.8, 18.9], [10.9, 11.9, 17.2, 19, 19.1],
            [11, 12, 17.4, 19.2, 19.3], [11.1, 12.1, 17.5, 19.3, 19.4], [11.2, 12.2, 17.7, 19.5, 19.6], [11.3, 12.3, 17.9, 19.7, 19.8],
            [11.4, 12.4, 18, 19.9, 20], [11.5, 12.6, 18.2, 20.1, 20.2], [11.6, 12.7, 18.4, 20.3, 20.4], [11.8, 12.8, 18.6, 20.5, 20.6],
            [11.9, 12.9, 18.7, 20.7, 20.8], [12, 13, 18.9, 20.9, 21], [12.1, 13.2, 19.1, 21.1, 21.2], [12.2, 13.3, 19.3, 21.4, 21.5],
            [12.3, 13.4, 19.5, 21.6, 21.7], [12.4, 13.5, 19.7, 21.8, 21.9], [12.5, 13.7, 19.9, 22, 22.1], [12.7, 13.8, 20.1, 22.3, 22.4],
            [12.8, 13.9, 20.3, 22.5, 22.6], [12.9, 14.1, 20.5, 22.7, 22.8], [13, 14.2, 20.8, 23, 23.1], [13.2, 14.4, 21, 23.2, 23.3],
            [13.3, 14.5, 21.2, 23.5, 23.6], [13.4, 14.6, 21.4, 23.7, 23.8], [13.6, 14.8, 21.7, 24, 24.1], [137, 14.9, 21.9, 24.3, 24.4],
            [13.8, 15.1, 22.1, 24.5, 24.6], [14, 1000, 22.4, 24.8, 24.9], [14.1, 15.4, 22.6, 25.1, 25.2], [14.3, 15.6, 22.9, 25.4, 25.5],
            [14.4, 15.7, 23.1, 25.7, 25.8], [14.6, 15.9, 23.4, 26, 26.1], [14.7, 16.1, 23.6, 26.2, 26.3], [14.9, 16.2, 23.9, 26.5, 26.6],
            [15, 16.4, 24.2, 26.8, 26.9], [15.2, 16.6, 24.4, 27.1, 27.2], [15.3, 16.7, 24.7, 27.4, 27.5], [15.5, 16.9, 25, 27.8, 27.9],
            [15.6, 17.1, 25.2, 28.1, 28.2], [15.8, 17.2, 25.5, 28.4, 28.5], [15.9, 17.4, 25.8, 28.7, 28.8], [16.1, 17.6, 26.1, 29, 29.1],
            [16.2, 17.7, 26.3, 29.3, 29.4], [16.4, 17.9, 26.6, 29.6, 29.7], [16.5, 18.1, 26.9, 29.9, 30], [16.7, 18.3, 27.2, 30.3, 30.4],
            [16.8, 18.4, 27.4, 30.6, 30.7], [17, 18.6, 27.7, 30.9, 31], [17.2, 18.8, 28, 31.2, 31.3]
        ]
    ];

    if($ageInMonths >= 0 && $ageInMonths <= 22){
        $matrix = $limits23[$sex];
    } else {
        $matrix = $limits60[$sex];
    }

    return $matrix;
}