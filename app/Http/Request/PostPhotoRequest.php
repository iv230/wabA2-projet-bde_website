<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PostPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Must be logged into an account.
     * TO DO: Must be a participant of the event
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
     * The photo file must not be empty.
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
