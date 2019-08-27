<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumoRequest extends FormRequest
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
                        'nombre' => 'required|string|min:4|max:191|unique:insumos',
                        'descripcion' => 'nullable|string|min:4|max:191',
                        'categoria_id' => 'required|numeric',
                        'unidad_id' => 'required|numeric',
                        'existencia' => 'nullable|numeric',
                        'maximo' => 'nullable|numeric',
                        'reorden' => 'nullable|numeric',
                        'minimo' => 'nullable|numeric',
                        'precio_venta' => 'nullable|numeric',
                        'costo' => 'nullable|numeric',
                        'imagen'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ];
                }
            case 'PUT':{
                return [
                    'nombre' => 'required|string|min:4|max:191|unique:insumos,nombre,'. $this->route('insumo')->id,
                    'descripcion' => 'nullable|string|min:4|max:191,',
                    'categoria_id' => 'required|numeric',
                    'unidad_id' => 'required|numeric',
                    'existencia' => 'nullable|numeric',
                    'maximo' => 'nullable|numeric',
                    'reorden' => 'nullable|numeric',
                    'minimo' => 'nullable|numeric',
                    'precio_venta' => 'nullable|numeric',
                    'costo' => 'nullable|numeric',
                    'imagen'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
