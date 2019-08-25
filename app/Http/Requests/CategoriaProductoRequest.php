<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaProductoRequest extends FormRequest
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
                        'nombre' => 'required|string|min:4|max:50|unique:categorias',
                        'descripcion' => 'nullable|string|min:4|max:191',
                    ];
                }
            case 'PUT':{
                return [
                    'nombre' => 'required|string|min:4|max:50|unique:categorias,nombre,'. $this->route('catProducto')->id,
                    'descripcion' => 'nullable|string|min:4|max:191',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
