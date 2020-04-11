<?php

namespace App\Http\Controllers\Administrator;

use App\Department;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('q', '');
        $searchDepartment = $request->input('department', 'any');

        $studentsQuery = User::where('role_id', 2);
        if ($searchDepartment === 'no') {
            $studentsQuery = $studentsQuery->whereNull(
                'department_id'
            );
        } else if ($searchDepartment !== 'any') {
            $studentsQuery = $studentsQuery->where(
                'department_id',
                $searchDepartment
            );
        }

        $studentsQuery = $studentsQuery->where(
            function ($query) use ($searchTerm) {
                $likeParameter = '%' . $searchTerm . '%';

                $query->where('name', 'like', $likeParameter);
                $query->orWhere('username', 'like', $likeParameter);
            }
        );

        $students = $studentsQuery
            ->orderBy('name')
            ->get();

        $departments = Department::orderBy('name')->get();
        return view('students.index')
            ->with([
                'departments' => $departments,
                'students' => $students
            ])
            ->withInput([
                'q' => $searchTerm,
                'department' => $searchDepartment
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $student = User::where('username', $username)->first();
        $workloadDataHandler = new \StudentWorkloadData(
            $student,
            Carbon::now()
        );

        $workloadData = $workloadDataHandler->getFullWorkloadData();
        $punchInLogs = $student->punchInLogs()->take(5)->get();

        return view('students.show', [
            'punchInLogs' => $punchInLogs,
            'student' => $student,
            'workloadData' => $workloadData
        ]);
    }
}
