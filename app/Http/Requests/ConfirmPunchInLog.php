<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmPunchInLog extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coordinator-confirmation' => [
                'sometimes',
                'accepted'
            ]
        ];
    }
}
