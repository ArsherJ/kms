<?php

namespace App\Http\Controllers;

use App\Models\HistoryOfIndividualRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryOfIndividualRecordRequest;
use App\Http\Requests\UpdateHistoryOfIndividualRecordRequest;
use Yajra\DataTables\Facades\DataTables;

class HistoryOfIndividualRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoryOfIndividualRecordRequest $request)
    {

        $request->validate([
            'individual_record_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'bmi' => 'required',
            'bmi_category' => 'required',
            'date_recorded' => 'required',
        ]);

        return HistoryOfIndividualRecord::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryOfIndividualRecord $history_of_individual_records, $id)
    {
        return HistoryOfIndividualRecord::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryOfIndividualRecord $history_of_individual_records)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryOfIndividualRecordRequest $request, HistoryOfIndividualRecord $history_of_individual_records, $id)
    {
        $history_of_individual_records = HistoryOfIndividualRecord::find($id);
        $history_of_individual_records->update($request->all());

        return $history_of_individual_records;
    }

    /**
     * Remove the specified resource from storage.
     */
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
