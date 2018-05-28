<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
        $nowYear = date('Y');

        $stambuk_rulse = 'required|string|size:9|unique:mahasiswa,stambuk';

        if ($this->method() == 'PATCH') {
            $stambuk_rulse = 'required|string|size:9|unique:mahasiswa,stambuk,' . $this->get('id');
        }

        return [
            'stambuk' => $stambuk_rulse,
            'nama' => 'required|string|max:191',
            'ta' => 'required|numeric|max:'.$nowYear,
        ];
    }
}
