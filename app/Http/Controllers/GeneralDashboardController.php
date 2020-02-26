<?php

namespace App\Http\Controllers;

use App\Department;
use App\Helpers\BusinessDays;
use App\PunchInLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $userRole = Auth::user()->role->slug;
        $dashboardRouteName = $userRole . '.dashboard';
        return redirect(route($dashboardRouteName));
    }
}
