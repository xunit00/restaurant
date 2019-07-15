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
                        'nombre_producto' => 'required|string|max:191|unique:productos',
                        'descripcion_producto' => 'nullable|string|max:191',
                        'id_categoria' => 'required|numeric',
                        'id_unidad'=>'required|numeric',
                        'cantidad'=>'required|numeric',
                        'precio_venta'=>'required|numeric',
                        'costo'=>'required|numeric'
                    ];
                }
            case 'PUT':{
                return [
                    'nombre_producto' => 'required|string|max:191|unique:productos,nombre_producto,'. $this->route('producto')->id,
                    'descripcion_producto' => 'nullable|string|max:191,',
                    'id_categoria' => 'required|numeric',
                    'id_unidad'=>'required|numeric',
                    'cantidad'=>'required|numeric',
                    'precio_venta'=>'required|numeric',
                    'costo'=>'required|numeric'
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
