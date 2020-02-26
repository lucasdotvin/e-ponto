<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePunchInLog;
use App\PunchInLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PunchInLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $punchInLogs = PunchInLog::where('worker_id', Auth::user()->id)
            ->get();

        return view('student.punch-in-log-index', [
            'punchInLogs' => $punchInLogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.punch-in-log-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePunchInLog  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePunchInLog $request)
    {
        $validatedData = $request->validated();

        $punchInLog = new PunchInLog();
        $punchInLog->worker_id = Auth::user()->id;
        $punchInLog->work_day = $validatedData['work-day'];
        $punchInLog->work_start_time = $validatedData['work-start-time'];
        $punchInLog->work_end_time = $validatedData['work-end-time'];
        $punchInLog->work_total_time = $validatedData['work-total-time'];
        $punchInLog->save();

        return redirect(route('student.punch-in-logs.index'));
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

        return view('student.punch-in-log-show', [
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

        return view('student.punch-in-log-edit', [
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

        $punchInLog = PunchInLog::findByUuid($uuid);
        $punchInLog->work_day = $validatedData['work-day'];
        $punchInLog->work_start_time = $validatedData['work-start-time'];
        $punchInLog->work_end_time = $validatedData['work-end-time'];
        $punchInLog->work_total_time = $validatedData['work-total-time'];
        $punchInLog->save();

        return redirect(route('student.punch-in-logs.show', $uuid));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $punchInLog = PunchInLog::findByUuid($uuid);
        $punchInLog->delete();

        return redirect(route('student.punch-in-logs.index'));
    }
}
