<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Must be logged into an account.
     *
     * @return bool
     */
    public function authorize()
    {
        return session()->has('user');
    }

    /**
     * Get the validation rules that apply to the request.
     * Comment body must not be empty.
     *
     * @return array
     */
    public function rules()
    {
        return
            [
                'comment_content' => 'required',
            ];
    }
}
