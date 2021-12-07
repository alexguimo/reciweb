<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = User::where('id','=',request('id'));
        return [
            'name' => 'required', 'string', 'max:255',
            'cedula' => ['required', 'string', 'min:5', 'max:10', 'unique:users,cedula,'.request('id')],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.request('id')],
            'password' => 'sometimes'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Digite un Nombre válido.',
            'cedula.unique' => 'Esta cedula ya se encuentra registrada.',
            'cedula.required' => 'Digite una Cedula válida de 10 dígitos.',
            'email.unique' => 'Este Correo ya se encuentra registrado.',
            'email.required' => 'Digite un Correo válido.'
        ];
    }
}
