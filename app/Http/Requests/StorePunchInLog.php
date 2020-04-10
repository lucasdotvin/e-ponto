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
            'work-day' => [
                'required',
                'before_or_equal:now',
                'date'
            ],

            'work-start-time' => [
                'required',
                'date',
                'before:now'
            ],

            'work-end-time' => [
                'required',
                'date',
                'after:work-start-time',
                'before_or_equal:now'
            ],

            'work-total-time' => [
                'required'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $workDay = $this->input('work-day');
        $workStartTime = $this->input('work-start-time');
        $workEndTime = $this->input('work-end-time');

        $workStartDateTime = $workDay . ' ' . $workStartTime;
        $workEndDateTime = $workDay . ' ' . $workEndTime;

        $workTotalTime = new Carbon($workStartDateTime);
        $workTotalTime = $workTotalTime->diffInMinutes(
            $workEndDateTime
        );

        $this->merge([
            'work-start-time' => $workStartDateTime,
            'work-end-time' => $workEndDateTime,
            'work-total-time' => $workTotalTime
        ]);
    }
}
