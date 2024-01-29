<?php

namespace App\Http\Controllers;

use App\Models\FeedingProgram;
use App\Models\FeedingProgramIRLogs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedingProgramIRLogsRequest;
use App\Http\Requests\UpdateFeedingProgramIRLogsRequest;
use App\Models\IndividualRecord;
use Yajra\DataTables\Facades\DataTables;

class FeedingProgramIRLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FeedingProgramIRLogs::all();
    }

    public function datatable()
    {
        $data = FeedingProgramIRLogs::all();
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
    public function store(StoreFeedingProgramIRLogsRequest $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

        return FeedingProgramIRLogs::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedingProgramIRLogs $feeding_program_ir_logs, $id)
    {
        return FeedingProgramIRLogs::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedingProgramIRLogs $feeding_program_ir_logs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedingProgramIRLogsRequest $request, FeedingProgramIRLogs $feeding_program_ir_logs, $id)
    {
        $feeding_program_ir_logs = FeedingProgramIRLogs::find($id);
        $feeding_program_ir_logs->update($request->all());

        return $feeding_program_ir_logs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedingProgramIRLogs $feeding_program_ir_logs, $id)
    {
        $feeding_program_ir_logs = FeedingProgramIRLogs::find($id);

        $feeding_program_ir_logs->delete();
        return $feeding_program_ir_logs;
    }

    public function search_feeding_programs($id)
    {
        $data = FeedingProgramIRLogs::where('feeding_program_id', 'like', '%' . $id . '%')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function search_individual_records($id)
    {
        $data = FeedingProgramIRLogs::where('individual_record_id', 'like', '%' . $id . '%')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function get_unregistered_individual($feeding_program_id)
    {
        $individual_per_feeding_program = IndividualRecord::select("*")
        ->whereNotIn('individual_records.id', FeedingProgramIRLogs::select("feeding_program_i_r_logs.individual_record_id")
        ->rightJoin('individual_records', 'individual_records.id', '=', 'feeding_program_i_r_logs.individual_record_id')
        ->where('feeding_program_i_r_logs.feeding_program_id', $feeding_program_id))
        ->get();

        return $individual_per_feeding_program;
    }

    public function multi_insert(StoreFeedingProgramIRLogsRequest $request)
    {

        $data = $request->all();

        for($i=0; $i < count($data); $i++) {
            FeedingProgramIRLogs::create($data[$i]);
        }

        return [
            'message' => 'Multiple Insert Success.'
        ];

    }
}
