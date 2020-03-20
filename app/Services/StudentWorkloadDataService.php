<?php

namespace App\Services;

use App\DayOff;
use App\PunchInLog;
use App\User;
use Carbon\Carbon;

class StudentWorkloadDataService
{
    function __construct(User $student, Carbon $targetDate)
    {
        $this->student = $student;
        $this->targetDate = $targetDate;
    }

    private function countBusinessDays()
    {
        $targetYear = $this->targetDate->year;
        $targetMonth = $this->targetDate->month;
        $daysOff = DayOff::whereYear('day_off', $targetYear)
            ->whereMonth('day_off', $targetMonth)
            ->get();

        $businessDays = 0;
        $daysInMonth = $this->targetDate->daysInMonth;
        for ($dayNumber=1; $dayNumber <= $daysInMonth; $dayNumber++) {
            $day = $this->targetDate->setDay($dayNumber);
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

    public function getCompleteWorkload() {
        $studentId = $this->student->id;
        $targetYear = $this->targetDate->year;
        $targetMonth = $this->targetDate->month;
        $completeWorkload = PunchInLog::where('worker_id', $studentId)
            ->whereYear('work_day', $targetYear)
            ->whereMonth('work_day', $targetMonth)
            ->whereNotNull('confirmed_by')
            ->sum('work_total_time');

        $completeWorkload /= 60;
        return $completeWorkload;
    }

    public function getMonthTotalWorkload() {
        $businessDays = $this->countBusinessDays();

        $dailyWorkload = config('workload.daily_workload');
        $totalWorkload = $businessDays * $dailyWorkload;
        return $totalWorkload;
    }

    public function getFullWorkloadData()
    {
        $totalWorkload = $this->getMonthTotalWorkload();
        $completeWorkload = $this->getCompleteWorkload();

        return [
            'totalWorkload' => $totalWorkload,
            'completeWorkload' => $completeWorkload
        ];
    }
}
