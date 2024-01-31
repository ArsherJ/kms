<?php

namespace App\Http\Controllers;

use App\Models\IndividualRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndividualRecordRequest;
use App\Http\Requests\UpdateIndividualRecordRequest;
use Yajra\DataTables\Facades\DataTables;

use App\Imports\IndividualRecordImport;
use Maatwebsite\Excel\Facades\Excel;


class IndividualRecordController extends Controller
{
    public function index()
    {
        return IndividualRecord::all();
    }

    public function datatable()
    {
        $data = IndividualRecord::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
    }


    public function import(StoreIndividualRecordRequest $request)
    {
        $file = $request->file('file');

        if ($file)
        {
            Excel::import(new IndividualRecordImport, $file);
            return 'success';
        }
        else
        {
            return 'error';
        }
    }
    
    public function store(StoreIndividualRecordRequest $request)
    {

        $request->validate
        ([
            // Original User Input Validations:
                // 'first_name' => 'required',
                // 'last_name' => 'required',
                // 'gender' => 'required',
                // 'birthdate' => 'required',
                // 'height' => 'required',
                // 'weight' => 'required',
                // 'bmi' => 'required',
                // 'bmi_category' => 'required',
                // 'status' => 'required',
                // 'id_number' => 'required|unique:individual_records',

            'child_number' => 'required',
            'address' => 'required',
            'mother_last_name' => 'required',
            'mother_first_name' => 'required',
            'child_last_name' => 'required',
            'child_first_name' => 'required',
            'ip_group' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'height' => 'required',
            'weight' => 'required'
        ]);

        return IndividualRecord::create($request->all());
    }

    public function show(IndividualRecord $individual_record, $id)
    {
        return IndividualRecord::find($id);
    }

    public function edit(IndividualRecord $individual_record)
    {
        
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