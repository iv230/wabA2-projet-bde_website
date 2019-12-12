<?php

namespace App\Http\Request;

use App\Http\Controllers\ParticipantController;
use Illuminate\Foundation\Http\FormRequest;

class ParticipateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (session()->has('user'))
        {
            $participantController = new ParticipantController();

            return !$participantController->isParticipating($this->input('id_user'), $this->input('id_event'));
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
        return [
            'id_user' => 'required|numeric',
            'id_event' => 'required|numeric'
        ];
    }
}
