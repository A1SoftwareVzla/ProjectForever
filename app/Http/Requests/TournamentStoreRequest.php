<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentStoreRequest extends FormRequest
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
        $rules = [
            'name'          => 'required|string|max:100',
            'teams'         => 'required|array', 
            'description'   => 'nullable',
        ];

        if($this->get('symbol')){
            $rules = array_merge($rules, ['symbol' => 'mimes:jpg,jpeg,png']);
        }
        if($this->get('image')){
            $rules = array_merge($rules, ['image' => 'mimes:jpg,jpeg,png']);
        }
        return $rules;
    }
}
