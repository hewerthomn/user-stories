<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BugStoreRequest extends Request
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
            'title' => 'required',
            'pre_conditions' => 'required',
            'steps_to_reproduce' => 'required',
            'description' => 'required',
            'desired_situation' => 'required',
        ];
    }
}
