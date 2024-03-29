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
       /*$id = hogar::Where('id_hogar','=',request('id_hogar'))
        ->pluck('idhogar')
        ->implode('id', request('idhogar'));

         , 'unique:hogars,id_hogar,'.$id */

        return [
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return[
            'ciudad.required' => 'Seleccione una Ciudad válida.',
            'direccion.required' => 'Digite una Dirección de hogar.',
        ];
    }
}
