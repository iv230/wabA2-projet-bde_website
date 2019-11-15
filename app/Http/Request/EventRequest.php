<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
                'name'                  => 'required|max:30',
                'description'           => 'required|max:600',
                'location'              => 'required|max:60',
                'recurrence'           => 'max:30',
                'state'                 => '1',
                'price'                 => '',
                'date_event'            => 'required|date'

            ];
    }
}
