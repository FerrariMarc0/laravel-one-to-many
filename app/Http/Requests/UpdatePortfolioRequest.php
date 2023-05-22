<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePortfolioRequest extends FormRequest
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
            'name' => ['required', Rule::unique('portfolios')->ignore($this->portfolio), 'max:255'],
            'description' =>'nullable',
            'start_date' => 'required|date',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|image|max:2048',
            'set_image' => 'boolean'
        ];
    }
}
