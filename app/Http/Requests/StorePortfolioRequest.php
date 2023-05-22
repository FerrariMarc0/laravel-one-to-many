<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'name' =>'required|max:255',
            'description' =>'nullable',
            'start_date' => 'required|date',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|image|max:2048'
        ];
    }
    public function messages(){
        return [

            'required' => 'Il campo non può essere vuoto',
            'date' => 'Campo obbligatorio.',
            'max:255' => 'Massimo 255 caratteri'
        ];
    }
}
