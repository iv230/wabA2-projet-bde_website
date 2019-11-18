<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PostPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TO DO: Only for participants
        return (session()->has('user'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required'
        ];
    }
}
