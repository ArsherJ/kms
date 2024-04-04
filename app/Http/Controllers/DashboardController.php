<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualRecord;
use App\Models\FeedingProgram;
use App\Models\User;
use App\Models\Announcement;
use App\Models\HistoryOfIndividualRecord;

class DashboardController extends Controller
{
    public function getCounts()
    {
        $counts = [
            'individualRecordCount' => IndividualRecord::count(),
            'userCount' => User::count(),
            'feedingProgramCount' => FeedingProgram::count(),
            'announcementCount' => Announcement::count(),
            "foodPacksCount" => HistoryOfIndividualRecord::where('food_pack_given', '=', 'Yes')->count()
        ];

        return $counts;
    }
}
