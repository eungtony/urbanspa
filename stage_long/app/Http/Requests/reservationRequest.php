<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class reservationRequest extends Request
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
            'nom' => 'required',
            'prenom' => 'required',
            'time' => 'required',
            'jours' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
            'mail' => 'required',
            'numero_telephone' => 'required'

        ];
    }
}
