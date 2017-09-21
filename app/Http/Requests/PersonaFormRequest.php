<?php

namespace PJD\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad'=> 'required|integer|between:15,50',
            'remera' => 'required|string',
            'cedula' => 'unique:personas,cedula|integer|between:100000,8000000',
            'email' => 'email',
            'localidad' => 'required',
            'experiencia' => 'required',
            'foto' => 'mimes:jpeg,bmp,png|max:2000',
            //el campo permiso es requerido si la edad tiene valor entre 15 y 17
            'fotopermiso' => 'mimes:jpeg,bmp,png|max:2000',
        ];
    }
}
