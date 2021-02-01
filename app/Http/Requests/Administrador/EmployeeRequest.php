<?php

namespace biox2020\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'nombres'           => 'required',
            'apellido_paterno'  => 'required',
            'apellido_materno'  => 'required',
            'telefono'          => 'required',
            'direccion'         => 'required',
            'sexo'              => 'required',
            'dni'               => 'required',
            'correo'            => 'required',
            'password'          => 'required'
        ];
    }
}