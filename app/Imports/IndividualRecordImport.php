<?php

namespace App\Imports;

use App\Models\IndividualRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndividualRecordImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        
        // return new IndividualRecord

        if (count($row) >= 12)
        {
            return new IndividualRecord
            ([
                'address' => $row[0],
                'mother_last_name' => $row[1],
                'mother_first_name' => $row[2],
                'child_last_name' => $row[3],
                'child_first_name' => $row[4],
                'sex' => $row[5],
                'birthdate' => $row[6],
                'ip_group' => $row[7],
                'micronutrient' => $row[8],
                'sex' => $row[9],
                'height' => $row[10],
                'weight' => $row[11],
            ]);
        }
        else
        {
            // Handle the case where the $row array doesn't have enough elements.
            // You might want to log an error or handle it based on your requirements.
            \Log::error("Row does not have enough elements: " . json_encode($row));
            return null;
        }
    }

    public function startRow(): int
    {
        return 0; // Start importing from the _ row.
    }
}