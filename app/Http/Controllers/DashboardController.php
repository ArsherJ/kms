<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualRecord;
use App\Models\FeedingProgram;
use App\Models\User;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function getCounts()
    {
        $counts = [
            'individualRecordCount' => IndividualRecord::count(),
            'userCount' => User::count(),
            'feedingProgramCount' => FeedingProgram::count(),
            'announcementCount' => Announcement::count(),
        ];

        return $counts;
    }
}
