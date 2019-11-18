<?php

namespace App\Http\Request;

use App\Http\Controllers\LikeController;
use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
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
            $likeController = new LikeController();

            return !$likeController->hasLiked($this->input('id_event'), $this->input('id_user'));
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

