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

        switch ($userRoleSlug) {
            case 'guest':
                return view('dashboard', [
                    'dashboardPath' => $userRoleDashboardPath
                ]);

                break;

            case 'student':
                $currentDate = Carbon::now();
                $businessDays = BusinessDays::inMonth($currentDate);
                $totalWorkload = $businessDays * 3;

                $completeWorkload = PunchInLog::whereMonth('work_day', $currentDate->month)
                    ->whereYear('work_day', $currentDate->year)
                    ->whereNotNull('confirmed_by')
                    ->sum('work_total_time');

                $completeWorkload /= 60;

                return view('dashboard', [
                    'dashboardPath' => $userRoleDashboardPath,
                    'totalWorkload' => $totalWorkload,
                    'completeWorkload' => $completeWorkload
                ]);

                break;

            case 'coordinator':
                $currentUserDepartment = Auth::user()->department;
                $departmentStudents = Department::where('id', $currentUserDepartment->id)
                    ->first()
                    ->users()
                    ->where('role_id', 2)
                    ->get();

                return view('dashboard', [
                    'dashboardPath' => $userRoleDashboardPath,
                    'departmentStudents' => $departmentStudents
                ]);

                break;
        }
    }
}
