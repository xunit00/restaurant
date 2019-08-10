<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesaRequest extends FormRequest
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
                        'nombre' => 'required|string|max:191|unique:mesas',
                        'cubiertos' => 'required|numeric',
                        'area_id' => 'required|numeric'
                    ];
                }
            case 'PUT':{
                return [
                    'nombre' => 'required|string|max:191|unique:mesas,nombre,'. $this->route('mesa')->id,
                    'cubiertos' => 'required|numeric',
                    'area_id' => 'required|numeric'
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
