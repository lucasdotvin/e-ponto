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
        $workloadDataHandler = new \StudentWorkloadData(
            Auth::user(),
            Carbon::now()
        );

        $workloadData = $workloadDataHandler->getFullWorkloadData();

        return view('student.dashboard', [
            'workloadData' => $workloadData
        ]);
    }
}
