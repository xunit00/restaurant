<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprobanteRequest extends FormRequest
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
                        'serie_tipo' => 'required|string|size:3|unique:comprobante_tipos',
                        'descripcion' => 'nullable|string|min:4|max:191',
                    ];
                }
            case 'PUT':{
                return [
                    'serie_tipo' => 'required|string|size:3|unique:comprobante_tipos,serie_tipo,'. $this->route('comprobanteTipo')->id,
                    'descripcion' => 'nullable|string|min:4|max:191',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
