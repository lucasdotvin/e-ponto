<?php

namespace App\Helpers;

use App\DayOff;
use Carbon\Carbon;

class BusinessDays
{
    public static function inMonth(Carbon $month) {
        $daysOff = DayOff::whereMonth('day_off', $month->month)
            ->whereYear('day_off', $month->year)
            ->get();

        $businessDays = 0;
        $daysInMonth = $month->daysInMonth;
        for ($dayNumber=1; $dayNumber <= $daysInMonth; $dayNumber++) {
            $day = $month->setDay($dayNumber);
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
}
