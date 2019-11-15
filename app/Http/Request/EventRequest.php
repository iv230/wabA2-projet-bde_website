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
                return if (session('role') == 2 || session('role') == 4 )
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
                    'name'                  => 'required|max:30|alpha_num',
                    'description'           => 'required|max:255|string',
                    'location'              => 'required|max:60|address',
                    'reccurrence'           => 'required|max:30|alpha_num',
                    'state'                 => '1',
                    'price'                 => 'required|numeric',
                    'date_event'            => 'required|date'

                ];
        }
}
