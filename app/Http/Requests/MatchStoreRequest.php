<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchStoreRequest extends FormRequest
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
            'home_team'     => 'required|integer',
            'visitor_team'  => 'required|integer',
            'date'          => 'required',
            'time'          => 'required',
            'fixture_id'    => 'required|integer',
        ];
    }
}
