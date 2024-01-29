<?php

namespace App\Http\Controllers;

use App\Models\ContentDirectory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentDirectoryRequest;
use App\Http\Requests\UpdateContentDirectoryRequest;
use Yajra\DataTables\Facades\DataTables;

class ContentDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContentDirectory::all();
    }

    public function datatable()
    {
        $data = ContentDirectory::all();
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
    public function store(StoreContentDirectoryRequest $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

        return ContentDirectory::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ContentDirectory $content_directory, $id)
    {
        return ContentDirectory::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentDirectory $content_directory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentDirectoryRequest $request, ContentDirectory $content_directory, $id)
    {
        $content_directory = ContentDirectory::find($id);
        $content_directory->update($request->all());

        return $content_directory;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContentDirectory $content_directory, $id)
    {
        $content_directory = ContentDirectory::find($id);

        $content_directory->delete();
        return $content_directory;
    }
}
