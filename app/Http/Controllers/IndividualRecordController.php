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
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    public function import(StoreIndividualRecordRequest $request)
    {
        $file = $request->file('file');

        if ($file) {
            Excel::import(new IndividualRecordImport, $file);
            return 'success';
        } else {
            return 'error';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndividualRecordRequest $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'bmi' => 'required',
            'bmi_category' => 'required',
            'status' => 'required',
            'id_number' => 'required|unique:individual_records',
        ]);

        return IndividualRecord::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(IndividualRecord $individual_record, $id)
    {
        return IndividualRecord::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndividualRecord $individual_record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndividualRecordRequest $request, IndividualRecord $individual_record, $id)
    {
        $individual_record = IndividualRecord::find($id);
        $individual_record->update($request->all());

        return $individual_record;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndividualRecord $individual_record, $id)
    {
        $individual_record = IndividualRecord::find($id);

        $individual_record->delete();
        return $individual_record;
    }
}
