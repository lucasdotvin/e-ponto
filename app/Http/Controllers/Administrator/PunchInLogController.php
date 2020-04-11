<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\PunchInLog;
use App\User;

class PunchInLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $student = User::where('username', $username)->first();
        return view('punch-in-logs.index', [
            'punchInLogs' => $student->punchInLogs,
            'student' => $student
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $punchInLog = PunchInLog::findByUuid($uuid);

        return view('punch-in-logs.show', [
            'punchInLog' => $punchInLog
        ]);
    }
}
