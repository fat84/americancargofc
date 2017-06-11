<?php

namespace App\Http\Requests\Usuario;

use App\Http\Requests\Request;

class CrearUsuarioRequest extends Request
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
        return [
            'identificacion' => 'required|unique:personas,identificacion|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|numeric',
            'barrio' => 'required',
            'direccion' => 'required',
            'foto' => 'image',
            'rol_id' => 'required|exists:rol,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ];
    }
}
