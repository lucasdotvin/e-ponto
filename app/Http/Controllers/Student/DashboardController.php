<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        $student = auth()->user();
        $workloadDataHandler = new \StudentWorkloadData(
            $student,
            Carbon::now()
        );

        $workloadData = $workloadDataHandler->getFullWorkloadData();

        return view('students.show', [
            'student' => $student,
            'workloadData' => $workloadData
        ]);
    }
}
