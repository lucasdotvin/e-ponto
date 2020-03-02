<?php

namespace App\Http\Controllers\Coordinator;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
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
