<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LikeQuotationRequest extends FormRequest
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
          'quotation_id' => 'required|exists:quotations,id|unique:likes,quotation_id,NULL,id,user_id,' . auth()->id()
        ];
    }

    
    public function failedValidation(Validator $validator){

        throw new HttpResponseException(response()->json([
            'success'=> false,
            'error'=> true,
            'message'=> 'Erreur de validation',
            'errorsList'=> $validator->errors()
        ]));
    }

    public function messages(){
        return [

            
            'quotation.unique' => 'Vous avez déjà liké cette citation.',
        
        ];
    }
}
