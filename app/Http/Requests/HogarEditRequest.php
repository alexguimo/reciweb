<?php

namespace App\Http\Requests;

use App\Models\hogar;
use Illuminate\Foundation\Http\FormRequest;
use PhpParser\NodeVisitor\FirstFindingVisitor;

class HogarEditRequest extends FormRequest
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
        $id = hogar::join('users','hogars.user_id','=','users.id')
        ->Where('id_hogar','=',request('id_hogar'))
        ->pluck('idhogar')
        ->First();

        /* , 'unique:hogars,id_hogar,'.$id */

        return [
            'id_hogar' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return[
            //'id_hogar.unique' => 'Este hogar ya se encuentra registrado.',
            'id_hogar.required' => 'Digite un Identificador de hogar válido.',
            'direccion.required' => 'Digite una Dirección de hogar.',
            'ciudad.required' => 'Seleccione una Ciudad válida.'
        ];
    }
}
