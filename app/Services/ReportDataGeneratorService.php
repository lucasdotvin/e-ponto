<?php

namespace App\Services;

use App\User;
use Carbon\Carbon;

class ReportDataGeneratorService
{
    public function general(Carbon $targetMonth)
    {
        $students = User::where('role_id', 2)
            ->whereNotNull('department_id')
            ->orderBy('name')
            ->get();

        $reportRows = [];
        foreach ($students as $student) {
            $workloadData = new \StudentWorkloadData(
                $student,
                $targetMonth
            );

            $completeWorkload = $workloadData->getCompleteWorkload();

            $reportRows[] = [
                'student' => $student,
                'complete-workload' => $completeWorkload
            ];
        }

        $totalWorkload = $workloadData->getMonthTotalWorkload();
        $reportData = [
            'rows' => $reportRows,
            'total-workload' => $totalWorkload
        ];

        return $reportData;
    }
}
