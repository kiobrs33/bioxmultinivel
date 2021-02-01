<?php

namespace biox2020\Http\Requests\Multinivel;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionPartnerSimpleRequest extends FormRequest
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
            'dni'                   => 'required',
            'nombres'               => 'required',
            'apellido_paterno'      => 'required',
            'apellido_materno'      => 'required',
            'fecha_nacimiento'      => 'required',
            'sexo'                  => 'required',
            'direccion_domicilio'   => 'required',
            'pais'                  => 'required',
            'departamento'          => 'required',
            'provincia'             => 'required',
            'distrito'              => 'required',
            'correo_electronico'    => 'required',
            'telefono'              => 'required',
            'terminos_condiciones'  => 'required'
        ];
    }
}