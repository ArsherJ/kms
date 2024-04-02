<?php

namespace App\Http\Controllers;

use App\Models\HistoryOfIndividualRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryOfIndividualRecordRequest;
use App\Http\Requests\UpdateHistoryOfIndividualRecordRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

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

    public function datatableshow(HistoryOfIndividualRecord $history_of_individual_records, $child_number)
    {
        $data = HistoryOfIndividualRecord::where('child_number', $child_number)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function micronutrientdatatableshow(HistoryOfIndividualRecord $history_of_individual_records, $child_number)
    {
        $data = HistoryOfIndividualRecord::where('child_number', $child_number)
                        ->where(function($query) {
                            $query->whereNotNull('food_pack_given_date')
                                  ->where(function($innerQuery) {
                                      $innerQuery->whereNull('nutrient_given_date')
                                                 ->orWhereNull('micronutrient');
                                  });
                        })
                        ->orWhere(function($query) {
                            $query->whereNull('food_pack_given_date')
                                  ->whereNotNull('nutrient_given_date')
                                  ->whereNotNull('micronutrient');
                        })
                        ->orWhere(function($query) {
                            $query->whereNotNull('food_pack_given_date')
                                  ->whereNotNull('nutrient_given_date')
                                  ->whereNotNull('micronutrient');
                        })
                        ->get();
    
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
            // 'micronutrient' => 'required',
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

    public function data_chart($month)
    {
        $latestRecords = HistoryOfIndividualRecord::whereIn('date_measured', function($query) use ($month) {
            $query->selectRaw('MAX(date_measured)')
                  ->from('history_of_individual_records')
                  ->whereMonth('date_measured', $month)
                  ->groupBy('child_number');
        })->get();

        return response()->json($latestRecords);
    }

    public function data_chart_year($year)
    {
        $latestRecords = HistoryOfIndividualRecord::whereIn('date_measured', function($query) use ($year) {
            $query->selectRaw('MAX(date_measured)')
                ->from('history_of_individual_records')
                ->whereYear('date_measured', $year)
                ->groupBy(DB::raw('MONTH(date_measured)'), 'child_number');
        })->get();
    
        return response()->json($latestRecords);
    }
    public function individual_view_graph($year, $id)
    {
        $latestRecords = DB::select("
            SELECT *
            FROM history_of_individual_records h1
            WHERE (h1.date_measured, h1.child_number) IN (
                SELECT MAX(date_measured), child_number
                FROM history_of_individual_records h2
                WHERE YEAR(h2.date_measured) = YEAR(h1.date_measured)
                AND MONTH(h2.date_measured) = MONTH(h1.date_measured)
                GROUP BY YEAR(h2.date_measured), MONTH(h2.date_measured), child_number
            )
            AND YEAR(h1.date_measured) = ?
            AND h1.child_number = ?;
        ", [$year, $id]);
    
        return response()->json($latestRecords);
    }
    
    

    
}