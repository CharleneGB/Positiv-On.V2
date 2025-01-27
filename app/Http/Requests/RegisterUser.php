<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'
        ];
    }

    
    public function failedValidation(Validator $validator){

        throw new HttpResponseException(response()->json([
            'success'=> false,
            'status.code'=> 422,
            'error'=> true,
            'message'=> 'Erreur de validation',
            'errorsList'=> $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'name.required' => 'Un nom d\'utilisateur doit être fourni',
            'email.required' => 'Une adresse email doit être fournie',
            'email.unique' => 'Cette adresse email existe déjà.',
            'password.required' => 'Un mot de passe doit être défini.' 
        ];
    }
}
