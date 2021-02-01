<?php

namespace biox2020\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class RankRequest extends FormRequest
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
            'nombre'                  => 'required',
            'descripcion'             => 'required',
            'puntaje_personal'        => 'required',
            'puntaje_grupal'          => 'required',
            'puntaje_directos'        => 'required',
            'activos_franquiciados'   => 'required'
        ];
    }
}