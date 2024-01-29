<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Announcement::all();
    }

    public function published()
    {
        return Announcement::where('status', 'Published')->get();
    }

    public function datatable()
    {
        $data = Announcement::all();
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
    public function store(StoreAnnouncementRequest $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        return Announcement::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement, $id)
    {
        return Announcement::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->update($request->all());

        return $announcement;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement, $id)
    {
        $announcement = Announcement::find($id);

        $announcement->delete();
        return $announcement;
    }
}
