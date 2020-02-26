<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $uuid)
    {
        $student = User::findByUuid($uuid);
        $workloadData = new \StudentWorkloadData($student);
        $workloadData = $workloadData->get();
        $punchInLogs = $student->punchInLogs()->take(5)->get();
        return view('coordinator.student-profile', [
            'punchInLogs' => $punchInLogs,
            'student' => $student,
            'workloadData' => $workloadData
        ]);
    }
}
