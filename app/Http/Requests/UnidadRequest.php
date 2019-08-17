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
                        'nombre' => 'required|string|min:4|max:50|unique:unidades',
                        'descripcion' => 'nullable|string|min:4|max:191',
                    ];
                }
            case 'PUT':{
                return [
                    'nombre' => 'required|string|min:4|max:50|unique:unidades,nombre,'. $this->route('unidade')->id,
                    'descripcion' => 'nullable|string|min:4|max:191',
                    'contenido'=>'required|integer',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
