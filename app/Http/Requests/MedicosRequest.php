<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicosRequest extends FormRequest
{
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
                'nome' => 'required',
                'cpf'=>'required',
                'cpf'=>'unique:medicos,cpf,'.$this->id,
                'email'=>'required|unique:medicos,email,'.$this->id

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'cpf.unique' => 'Já existe um médico com esse CPF cadastrado',
            'email.unique' => 'Já existe um médico com esse E-mail cadastrado'
        ];
    }
}