<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class optionRequest extends Request
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
            'options' => 'required',
            'option_ang' => 'required',
            'infos' => 'required',
            'infos_ang' => 'required',
            'prix' => 'required'
        ];
    }
}
