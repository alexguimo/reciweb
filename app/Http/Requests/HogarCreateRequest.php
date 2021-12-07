<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HogarCreateRequest extends FormRequest
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
            'id_hogar' => ['required', 'string', 'max:50','unique:hogars,id_hogar'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ];
    }
    
    public function messages()
    {
        return[
            'id_hogar.unique' => 'Este hogar ya se encuentra registrado.',
            'id_hogar.required' => 'Digite un Identificador de hogar válido.',
            'direccion.required' => 'Digite una Dirección de hogar.',
            'ciudad.required' => 'Seleccione una Ciudad válida.'
        ];
    }
}
