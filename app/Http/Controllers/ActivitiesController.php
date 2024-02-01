<?php

namespace App\Http\Controllers;

use App\Models\ActivityImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivitiesRequest;
use App\Http\Requests\UpdateActivitiesRequest;
use Yajra\DataTables\Facades\DataTables;

class ActivitiesController extends Controller
{
    //
    public function index()
    {
        return ActivityImages::all();
    }

    public function datatable()
    {
        $data = ActivityImages::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {

    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivitiesRequest $request)
    {

        $request->validate([
            'activity_id' => 'required',
            'blob_image' => 'required',

        ]);

        return ActivityImages::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityImages $activityImages, $id)
    {
        return ActivityImages::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityImages $activityImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivitiesRequest $request, activityImages $activityImages, $id)
    {
        $activityImages = activityImages::find($id);
        $activityImages->update($request->all());

        return $activityImages;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activityImages $activityImages, $id)
    {
        $activityImages = activityImages::find($id);

        $activityImages->delete();
        return $activityImages;
    }
}
