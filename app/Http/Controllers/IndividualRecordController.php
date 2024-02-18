<?php

namespace App\Http\Controllers;

use App\Models\IndividualRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndividualRecordRequest;
use App\Http\Requests\StoreHistoryOfIndividualRecordRequest;
use App\Http\Requests\UpdateIndividualRecordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\IndividualRecordImport;

class IndividualRecordController extends Controller
{
    public function index()
    {
        return IndividualRecord::all();
    }

    public function datatable(Request $request)
    {
        $query = IndividualRecord::query();
    
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
    
        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        } else {
            if ($fromDate) {
                $query->where('created_at', '>=', $fromDate);
            }
            if ($toDate) {
                $query->where('created_at', '<=', $toDate);
            }
        }
    
        $data = $query->get();
    
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        // Your create logic here if needed
    }

    public function import(StoreIndividualRecordRequest $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new IndividualRecordImport, $file);
            return response()->json(['message' => 'File imported successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error importing file: ' . $e->getMessage());
            return response()->json(['message' => 'Error importing file. Please check the file format.'], 500);
        }
    }

    public function store(StoreIndividualRecordRequest $request)
    {
        $request->validate([
            'child_number' => 'required',
            'address' => 'required',
            'mother_last_name' => 'required',
            'mother_first_name' => 'required',
            'child_last_name' => 'required',
            'child_first_name' => 'required',
            'ip_group' => 'required',
            'micronutrient' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ]);

        return IndividualRecord::create($request->all());
    }

    public function show(IndividualRecord $individual_record, $id)
    {
        return IndividualRecord::find($id);
    }

    public function edit(IndividualRecord $individual_record)
    {
        // Your edit logic here if needed
    }

    public function update(UpdateIndividualRecordRequest $request, IndividualRecord $individual_record, $id)
    {
        $individual_record = IndividualRecord::find($id);
        $individual_record->update($request->all());

        return $individual_record;
    }

    public function destroy(IndividualRecord $individual_record, $id)
    {
        $individual_record = IndividualRecord::find($id);

        $individual_record->delete();
        return $individual_record;
    }


}
