<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonStoreRequest extends FormRequest
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
            'gender' => 'required',
            'growth_rate' => 'required',
            'nature' => 'required',
            'color' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'gender.required' => 'Поле "Gender" обязательно для заполнения',
            'growth_rate.required' => 'Поле "Growth rate" обязательно для заполнения',
            'nature.required' => 'Поле "Nature" обязательно для заполнения',
            'color.required' => 'Поле "Color" обязательно для заполнения',

        ];
    }
}
