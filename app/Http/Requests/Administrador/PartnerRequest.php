<?php

namespace biox2020\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'fecha_nacimiento'  => 'required',
            'direccion_domicilio'   => 'required',
            'dni'               => 'required',
            'sexo'              => 'required',
            'telefono'          => 'required',
            'pais'              => 'required',
            'departamento'      => 'required',
            'provincia'         => 'required',
            'distrito'          => 'required',
            'correo_electronico'    => 'required',
            'terminos_condiciones'  => 'required'
        ];
    }
}