<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipRequest extends FormRequest
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
            'street' => ['required', 'string', 'max:255'],
            'house_nr' => ['required', 'max:10'],
            'postal_code' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'street.required' => 'Street is required',
            'house_nr.required' => 'Nr is required',
            'postal_code.required' => 'Poastal code is required',
            'name.required' => 'City is required',
        ];
    }
}
