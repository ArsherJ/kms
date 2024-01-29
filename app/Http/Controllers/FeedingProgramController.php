<?php

namespace App\Http\Controllers;

use App\Models\FeedingProgram;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedingProgramRequest;
use App\Http\Requests\UpdateFeedingProgramRequest;
use Yajra\DataTables\Facades\DataTables;

class FeedingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FeedingProgram::all();
    }

    public function datatable()
    {
        $data = FeedingProgram::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function published()
    {
        return FeedingProgram::where('status', 'Published')->get();
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
    public function store(StoreFeedingProgramRequest $request)
    {

        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'time_of_program' => 'required',
            'date_of_program' => 'required',
            'date_posted' => 'required',
            'status' => 'required',
        ]);

        return FeedingProgram::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedingProgram $feeding_program, $id)
    {
        return FeedingProgram::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedingProgram $feeding_program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedingProgramRequest $request, FeedingProgram $feeding_program, $id)
    {
        $feeding_program = FeedingProgram::find($id);
        $feeding_program->update($request->all());

        return $feeding_program;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedingProgram $feeding_program, $id)
    {
        $feeding_program = FeedingProgram::find($id);

        $feeding_program->delete();
        return $feeding_program;
    }
}
