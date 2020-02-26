<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        $workloadData = new \StudentWorkloadData(Auth::user());
        $workloadData = $workloadData->get();
        return view('student.dashboard', [
            'workloadData' => $workloadData
        ]);
    }
}
