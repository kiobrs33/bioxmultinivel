<?php

namespace biox2020\Http\Requests\Trabajador;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPagoOrderRequest extends FormRequest
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
            'monto_cliente' => 'required',
            'comprobante_cliente' => 'required',  
        ];
    }
}
