<?php

namespace biox2020\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'total'         => 'required',
            'impuesto'      => 'required',
            'subtotal'      => 'required',
            'fecha_entrega' => 'required',
            'socio'         => 'required',
        ];
    }
}