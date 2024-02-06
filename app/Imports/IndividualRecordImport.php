<?php

namespace App\Imports;

use App\Models\IndividualRecord;
use App\Models\HistoryOfIndividualRecord;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndividualRecordImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        // Validate the array structure and data here if needed
        if (count($row) >= 11) {
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

