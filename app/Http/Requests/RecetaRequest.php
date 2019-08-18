<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaRequest extends FormRequest
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
                        'plato' => 'required|numeric|unique:recetas,plato_id',
                        'descripcion' => 'nullable|string|min:4|max:191',
                        'porciones' => 'required|numeric',
                    ];
                }
            case 'PUT':{
                return [
                    'plato' => 'required|numeric|unique:recetas,plato_id,'. $this->route('receta')->id,
                    'descripcion' => 'nullable|string|min:4|max:191',
                    'porciones' => 'required|numeric',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
