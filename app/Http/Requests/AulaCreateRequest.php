<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulaCreateRequest extends FormRequest
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
        return [
            'codigo' => 'required|unique:aulas',
            'num_aula' => 'required|unique:aulas',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El codigo es requerido '
        ];
    }
}
