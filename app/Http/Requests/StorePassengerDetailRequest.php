<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassengerDetailRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'passengers' => 'required|array|min:1',
            'passengers.*.name' => 'required',
            'passengers.*.date_of_birth' => 'required',
            'passengers.*.nationality' => 'required',
            
        ];
    }

   public function attributes()
   {
    return [
        'passengers.*.name' => 'Passenger Name',
        'passengers.*.date_of_birth' => 'Passenger Date of Birth',
        'passengers.*.nationality' => 'Passenger nationality',
    ];
   }

   public function messages()
   {
       return [
            'passengers.*.name.required' => ':attributes field is required',
            'passengers.*.date_of_birth.required' => ':attributes field is required',
            'passengers.*.nationality.required' => ':attributes field is required',
       ];
   }
           
}
