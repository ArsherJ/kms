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
                'age_in_months' => $ageInMonths,
                'weight_for_age_status' => $weightForAgeStatus,
                'height_length_for_age_status' => $heightLengthForAgeStatus,
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
                'weight_for_age_status' => $this->calculateWeightForAgeStatus($this->calculateAgeInMonths($row[7]), $row[6], $row[11]),
                'height_length_for_age_status' => $this->calculateHeightLengthForAgeStatus($this->calculateAgeInMonths($row[7]), $row[6], $row[10]),
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
            case 0:
                if (sex === "Male") { setWeightForAgeStatus(2.1, 2.2, 4.4, $weight); }
                else if (sex === "Female") { setWeightForAgeStatus(2.0, 2.1, 4.2, $weight); }
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
