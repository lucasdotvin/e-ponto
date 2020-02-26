<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePunchInLog;
use App\PunchInLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PunchInLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string  $studentUuid
     * @return \Illuminate\Http\Response
     */
    public function index($studentUuid)
    {
        $student = User::findByUuid($studentUuid);
        return view('coordinator.punch-in-log-index', [
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

        return view('coordinator.punch-in-log-show', [
            'punchInLog' => $punchInLog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $punchInLog = PunchInLog::findByUuid($uuid);

        return view('coordinator.punch-in-log-edit', [
            'punchInLog' => $punchInLog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StorePunchInLog  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(StorePunchInLog $request, $uuid)
    {
        $validatedData = $request->validated();
        if ($validatedData['coordinator-confirmation'] ?? false) {
            $punchInLog = PunchInLog::findByUuid($uuid);
            $punchInLog->confirmed_by = Auth::user()->id;
            $punchInLog->save();
        }

        return redirect(route('coordinator.punch-in-logs.show', $uuid));
    }
}
