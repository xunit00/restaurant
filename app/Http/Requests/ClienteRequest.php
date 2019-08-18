<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
                        'name' => 'required|string|min:4|max:191',
                        'username' => 'required|string|min:4|max:10|unique:users',
                        'dni' => 'nullable|string|size:11|unique:users',
                        'telefono' => 'nullable|string|size:10',
                        'direccion' => 'nullable|string',
                    ];
                }
            case 'PUT':{
                return [
                    'name' => 'required|string|min:4|max:191',
                    'username' => 'required|string|min:4|max:10|unique:users,username,'. $this->route('cliente')->id,
                    'dni' => 'nullable|string|size:11|unique:users,dni,' . $this->route('cliente')->id,
                    'telefono' => 'nullable|string|size:10',
                    'direccion' => 'nullable|string',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
