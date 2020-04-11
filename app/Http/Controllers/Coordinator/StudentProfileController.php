<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $username)
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
