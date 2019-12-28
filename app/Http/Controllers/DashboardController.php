<?php

namespace App\Http\Controllers;

use App\Department;
use App\Helpers\BusinessDays;
use App\PunchInLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $userRoleSlug = Auth::user()->role->slug;
        $userRoleDashboardPath = "roles.{$userRoleSlug}.dashboard";

        return view('dashboard', [
            'dashboardPath' => $userRoleDashboardPath
        ]);
    }
}
