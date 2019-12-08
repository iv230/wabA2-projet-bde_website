<?php

namespace App\Http\Request;

use App\Http\Controllers\ParticipantController;
use Illuminate\Foundation\Http\FormRequest;

class PostPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Must be logged into an account.
     *
     * @return bool
     */
    public function authorize()
    {
        if (session()->has('user'))
        {
            $participantController = new ParticipantController();

            return $participantController->isParticipating($this->input('id_user'), $this->input('id_event'));
        }
        else
        {
            return false;
        }
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
