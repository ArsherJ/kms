<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Faq::all();
    }

    public function datatable()
    {
        $data = Faq::all();
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
    public function store(StoreFaqRequest $request)
    {

        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        return Faq::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq, $id)
    {
        return Faq::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq, $id)
    {
        $faq = Faq::find($id);
        $faq->update($request->all());

        return $faq;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq, $id)
    {
        $faq = Faq::find($id);

        $faq->delete();
        return $faq;
    }
}
