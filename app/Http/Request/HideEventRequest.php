<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class HideEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * The user must be logged on a BDE or admin account
     *
     * @return bool
     */
    public function authorize()
    {
        if (session()-> has('user'))
        {
            return (session('role') == 2 || session('role') == 4 );
        }
        else
        {
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
            [
                'id_event'   => 'required|numeric',
                'action'     => 'required|min:0|max:1'
            ];
    }
}
