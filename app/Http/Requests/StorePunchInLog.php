<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePunchInLog extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'work_day' => [
                'required',
                'before_or_equal:now',
                'date'
            ],

            'work_start_time' => [
                'required',
                'date',
                'before:now'
            ],

            'work_end_time' => [
                'required',
                'date',
                'after:work_start_time',
                'before_or_equal:now'
            ],

            'work_total_time' => [
                'required'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $workDay = $this->input('work_day');
        $workStartTime = $this->input('work_start_time');
        $workEndTime = $this->input('work_end_time');

        $workStartDateTime = $workDay . ' ' . $workStartTime;
        $workEndDateTime = $workDay . ' ' . $workEndTime;

        $workTotalTime = new Carbon($workStartDateTime);
        $workTotalTime = $workTotalTime->diffInMinutes(
            $workEndDateTime
        );

        $this->merge([
            'work_start_time' => $workStartDateTime,
            'work_end_time' => $workEndDateTime,
            'work_total_time' => $workTotalTime
        ]);
    }
}
