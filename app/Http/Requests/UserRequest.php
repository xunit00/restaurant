<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                        'email' => 'required|string|email|max:191|unique:users',
                        'username' => 'required|string|min:4|max:10|unique:users',
                        'password' => 'required|string|min:6',
                        'rol' => 'required|numeric',
                        'dni' => 'nullable|string|unique:users',
                        'telefono' => 'nullable|string',
                        'direccion' => 'nullable|string',
                    ];
                }
            case 'PUT':{
                return [
                    'name' => 'required|string|min:4|max:191',
                    'email' => 'required|string|email|max:191|unique:users,email,' . $this->route('user')->id,
                    'username' => 'required|string|min:4|max:10|unique:users,username,'. $this->route('user')->id,
                    'password' => 'sometimes|required|string|min:6',
                    'rol' => 'required|numeric',
                    'dni' => 'nullable|string|unique:users,dni,' . $this->route('user')->id,
                    'telefono' => 'nullable|string',
                    'direccion' => 'nullable|string',
                ];
            }
            case 'PATCH':
            default:
                break;
        }
    }
}
