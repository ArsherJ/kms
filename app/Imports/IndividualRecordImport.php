<?php

namespace App\Imports;

use App\Models\IndividualRecord;
use App\Models\HistoryOfIndividualRecord;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndividualRecordImport implements ToModel, WithHeadingRow, WithStartRow
{
    public function model(array $row)
    {
        // Validate the array structure and data here if needed
        if (count($row) >= 11) {
            // Create IndividualRecord
            $individualRecord = new IndividualRecord([
                'child_number' => $row['id_number'],
                'address' => $row['address'],
                'mother_last_name' => $row['parent_last_name'],
                'mother_first_name' => $row['parent_first_name'],
                'child_last_name' => $row['child_last_name'],
                'child_first_name' => $row['child_first_name'],
                'ip_group' => $row['ip_group'],
                'micronutrient' => $row['micronutrient'],
                'sex' => $row['sex'],
                'birthdate' => $row['birthdate'],
                // 'date_measured' => $row['date_measured'],
                'height' => $row['height'],
                'weight' => $row['weight'],
            ]);

            // Save IndividualRecord to the database
            $individualRecord->save();

            // Create HistoryOfIndividualRecord
            $historyRecord = new HistoryOfIndividualRecord([
                'child_number' => $row['id_number'],
                'address' => $row['address'],
                'mother_last_name' => $row['parent_last_name'],
                'mother_first_name' => $row['parent_first_name'],
                'child_last_name' => $row['child_last_name'],
                'child_first_name' => $row['child_first_name'],
                'ip_group' => $row['ip_group'],
                'micronutrient' => $row['micronutrient'],
                'sex' => $row['sex'],
                'birthdate' => $row['birthdate'],
                // 'date_measured' => $row['date_measured'],
                'height' => $row['height'],
                'weight' => $row['weight'],
                // Add other fields as needed
            ]);

            // Save HistoryOfIndividualRecord to the database
            $historyRecord->save();

            return $individualRecord;
        }

        Log::error('Row does not have enough elements: ' . json_encode($row));
        return null;
    }

    public function startRow(): int
    {
        return 2; // Assuming header is in the first row and data starts from the second row.
    }
}

