<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $username = 'required|string|max:255|unique:users';

        if ($this->method() == 'PATCH') {
            $username = $username . ',username,' . $this->get('id');
        }

        return [
            'name' => 'required|string|max:255',
            'username' => $username,
            'level' => 'required|numeric'
        ];
    }
}
