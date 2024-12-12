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
                'required' . request()->route('aula')->id
            ],
            'num_aula' => [
                'required' . request()->route('aula')->id
            ],

        ];
    }
}
