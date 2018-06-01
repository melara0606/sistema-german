<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisicionRequest extends FormRequest
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
            'actividad' => 'required',
            'unidad_admin' => 'required',
            'fuente_financiamiento' => 'required',
            'justificacion' => 'required',
            'requisiciones' => 'required',
        ];
    }

    public function messages()
    {
      return [
      'actividad.required'=>'El campo actividad es obligatoria',
      'unidad_admin.required' => 'El campo unidad administrativa es obligatoria',
      'fuente_financiamiento.required' => 'El campo fuente de financiamiento es obligatoria',
      'justificacion' => 'La justifiacion es obligatoria',
      'requisiciones.required' => 'El obligatorio al menos ingresar un material'
      ];
    }
}
