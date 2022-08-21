<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|min:6',
            'birthday' => 'required|date',
            'active' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El campo nombre es obligatorio",
            "email.required" => "El campo correo electronico es obligatorio",
            "email.email" => "Correo electronico incorrecto",
            "email.unique" => "Correo electronico existente",
            "password.min" => "La contraseña debe tener al menos 6 caracteres",
            "birthday.required" => "El cumpleaños es obligatorio",
            "birthday.date" => "El cumpleaños debe ser una fecha",
        ];
    }
}
