<?php

namespace App\Http\Controllers;

use App\Models\HistoryOfIndividualRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryOfIndividualRecordRequest;
use App\Http\Requests\UpdateHistoryOfIndividualRecordRequest;
use Yajra\DataTables\Facades\DataTables;

class HistoryOfIndividualRecordController extends Controller
{
    public function index()
    {
        return HistoryOfIndividualRecord::all();
    }

    public function datatable()
    {
        $data = HistoryOfIndividualRecord::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
    }

    public function store(StoreHistoryOfIndividualRecordRequest $request)
    {

        $request->validate
        ([
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

        return HistoryOfIndividualRecord::create($request->all());
    }

    public function show(HistoryOfIndividualRecord $history_of_individual_records, $id)
    {
        return HistoryOfIndividualRecord::find($id);
    }

    public function edit(HistoryOfIndividualRecord $history_of_individual_records)
    {
    }

    public function update(UpdateHistoryOfIndividualRecordRequest $request, HistoryOfIndividualRecord $history_of_individual_records, $id)
    {
        $history_of_individual_records = HistoryOfIndividualRecord::find($id);
        $history_of_individual_records->update($request->all());

        return $history_of_individual_records;
    }

    public function destroy(HistoryOfIndividualRecord $history_of_individual_records, $id)
    {
        $history_of_individual_records = HistoryOfIndividualRecord::find($id);

        $history_of_individual_records->delete();
        return $history_of_individual_records;
    }

    public function search_individual_records($id)
    {
        $data = HistoryOfIndividualRecord::where('individual_record_id', 'like', '%' . $id . '%')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

}