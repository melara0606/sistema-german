<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'nombre'=>'required|min:3|max:150',
            'dui'=>'required|unique:empleados',
            'nit'=>'required|unique:empleados',
            'direccion'=>'required|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo'=>'required',
            'num_cuenta'=>'unique:empleados',
            'celular' => 'required',
            'num_contribuyente' => 'unique:empleados',
            'num_seguro_social' => 'unique:empleados',
            'num_afp' => 'unique:empleados',
        ];
    }
}
