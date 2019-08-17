<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
                        'nombre' => 'required|string|min:4|max:191|unique:productos',
                        'descripcion' => 'nullable|string|min:4|max:191',
                        'categoria_id' => 'required|numeric',
                        'unidad_id' => 'required|numeric',
                        'existencia' => 'required|numeric',
                        'maximo' => 'required|numeric',
                        'reorden' => 'required|numeric',
                        'minimo' => 'required|numeric',
                        'precio_venta' => 'required|numeric',
                        'costo' => 'required|numeric',
                        'imagen'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ];
                }
            case 'PUT':{
                return [
                    'nombre' => 'required|string|min:4|max:191|unique:productos,nombre,'. $this->route('producto')->id,
                    'descripcion' => 'nullable|string|min:4|max:191,',
                    'categoria_id' => 'required|numeric',
                    'unidad_id' => 'required|numeric',
                    'existencia' => 'required|numeric',
                    'maximo' => 'required|numeric',
                    'reorden' => 'required|numeric',
                    'minimo' => 'required|numeric',
                    'precio_venta' => 'required|numeric',
                    'costo' => 'required|numeric',
                    'imagen'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
