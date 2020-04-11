<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReport;
use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', [
            'reports' => $reports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Requests\StoreReport $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReport $request)
    {
        $input = $request->validated();
        $month = new Carbon($input['month']);
        $reportDataGenerator = new \ReportDataGenerator();

        switch ($input['type']) {
            case 'general':
                $reportData = $reportDataGenerator->general(
                    $month
                );

                break;
        }

        $reportTemplate = 'pdf.report.' . $input['type'];
        $reportPDF = \PDF::loadView(
            $reportTemplate,
            compact('month', 'reportData')
        );

        return $reportPDF->stream();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
