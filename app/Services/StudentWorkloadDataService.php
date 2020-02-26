<?php

namespace App\Services;

use App\DayOff;
use App\PunchInLog;
use App\User;
use Carbon\Carbon;

class StudentWorkloadDataService
{
    function __construct(User $student)
    {
        $this->student = $student;
    }

    private function countBusinessDays(Carbon $currentDate)
    {
        $currentDate = Carbon::now();
        $daysOff = DayOff::whereYear('day_off', $currentDate->year)
            ->whereMonth('day_off', $currentDate->month)
            ->get();

        $businessDays = 0;
        $daysInMonth = $currentDate->daysInMonth;
        for ($dayNumber=1; $dayNumber <= $daysInMonth; $dayNumber++) {
            $day = $currentDate->setDay($dayNumber);
            $formattedDay = $day->format('Y-m-d');

            if ($day->isWeekend()) {
                continue;
            } else if ($daysOff->contains('day_off', $formattedDay)) {
                continue;
            }

            $businessDays++;
        }

        return $businessDays;
    }

    public function get()
    {
        $currentDate = Carbon::now();
        $businessDays = $this->countBusinessDays($currentDate);

        $dailyWorkload = config('workload.daily_workload');
        $totalWorkload = $businessDays * $dailyWorkload;

        $studentId = $this->student->id;
        $completeWorkload = PunchInLog::where('worker_id', $studentId)
            ->whereYear('work_day', $currentDate->year)
            ->whereMonth('work_day', $currentDate->month)
            ->whereNotNull('confirmed_by')
            ->sum('work_total_time');

        $completeWorkload /= 60;

        return [
            'totalWorkload' => $totalWorkload,
            'completeWorkload' => $completeWorkload
        ];
    }
}
