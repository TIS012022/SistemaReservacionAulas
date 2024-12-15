<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulaEditRequest extends FormRequest
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
        $permission = $this->route('aula');
        return [


            'codigo' => [
                'required', 'unique:aulas,codigo,' . request()->route('aula')->id
            ],
            'num_aula' => [
                'required', 'unique:aulas,num_aula,' . request()->route('aula')->id
            ],

        ];
    }
}
