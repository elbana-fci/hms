<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDecisionRequest extends FormRequest
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
            'decision_number'   => 'required',
            'judgement_number'  => 'required',
            'decision_date'     => 'required',
            'issuing_authority' => 'required'
        ];
    }
}
