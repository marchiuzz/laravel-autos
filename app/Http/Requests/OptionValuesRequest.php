<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionValuesRequest extends FormRequest
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
            'option_value' => "required|string|min:1|max:20",
            'options' => "required|int"
        ];
    }

    public function getValue(): string
    {
        return $this->input('option_value');
    }

    public function getSelectedOption(): int
    {
        return $this->input('options');
    }

}
