<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Se a validação falhar, retorna a mensagem de erro.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $validator->errors()
        ], 422));
    }

    /**
     * Retorna as regras de validação para cadastro de um carro.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'make' =>'required|string',
            'model' =>'required|string',
            'year' =>'required|string',
        ];
    }

    /**
     * Retorna as mensagens de erro personalizadas.
     */
    public function message(): array
    {
        return [
            'make.required' => 'O campo marca é obrigatório',
            'model.required' => 'O campo modelo é obrigatório',
            'year.required' => 'O campo senha é obrigatório',       
        ];
    }
}
