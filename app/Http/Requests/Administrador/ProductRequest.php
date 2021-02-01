<?php

namespace biox2020\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'codigo'        => 'required',
            'nombre'        => 'required',
            'descripcion'   => 'required',
            'puntos'        => 'required',
            'tipo_unidad'   => 'required',
            'url_imagen'    => 'required',
            'categoria'     => 'required',
            'precio'        => 'required',
            'cantidad.*'    => 'required',
            'almacen.*'     => 'required'
        ];
    }
}