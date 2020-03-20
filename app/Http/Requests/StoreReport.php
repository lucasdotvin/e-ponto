<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReport extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'month' => [
                'required',
                'date_format:Y-m',
                'before_or_equal:now'
            ],

            'type' => [
                'required',
                Rule::in(['general', 'student'])
            ],

            'username' => [
                'nullable',
                'exists:users,username',
                'integer',
                Rule::requiredIf(function () {
                    return request()->input('type') === 'student';
                })
            ]
        ];
    }
}
