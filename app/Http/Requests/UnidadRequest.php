<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadRequest extends FormRequest
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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'nombre_unidad' => 'required|string|min:4|max:50|unique:unidades',
                        'descripcion_unidad' => 'nullable|string|min:4|max:191',
                        'contenido'=>'required|integer'
                    ];
                }
            case 'PUT':{
                return [
                    'nombre_unidad' => 'required|string|min:4|max:50|unique:unidades,nombre_unidad,'. $this->route('unidad')->id,
                    'descripcion_unidad' => 'nullable|string|min:4|max:191',
                    'contenido'=>'required|integer',
                    'status'=>'required|boolean',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
