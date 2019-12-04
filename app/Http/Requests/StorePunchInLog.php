<?php

namespace App\Http\Requests;

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
            'work-day' => 'required|before_or_equal:now|date',
            'work-start-time' => 'required|date_format:H\:i\:s',
            'work-end-time' => 'required|date_format:H\:i\:s',
        ];
    }
}
