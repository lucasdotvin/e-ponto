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
        $userDepartmentId = Auth::user()->department_id;
        $department = Department::where('id', $userDepartmentId)
            ->with('users')
            ->first();

        return view('coordinator.dashboard', [
            'departmentStudents' => $departmentStudents
        ]);
    }
}
