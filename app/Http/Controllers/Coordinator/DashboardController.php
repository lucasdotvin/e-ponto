<?php

namespace App\Http\Controllers\Coordinator;

use App\Department;
use App\Helpers\BusinessDays;
use App\Http\Controllers\Controller;
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
        $userDepartment = Auth::user()->department;
        $departmentStudents = Department::where('id', $userDepartment->id)
            ->first()
            ->users()
            ->where('role_id', 2)
            ->get();

        return view('coordinator.dashboard', [
            'departmentStudents' => $departmentStudents
        ]);
    }
}
