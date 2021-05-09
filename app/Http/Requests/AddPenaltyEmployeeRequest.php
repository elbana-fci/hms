<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPenaltyEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'decision_id'   => 'required',
            'penalty_id'  => 'required',
            'employee_id' => 'required',
            'execution_date' => 'required'
        ];
    }
}
