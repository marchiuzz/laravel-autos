<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoRequest extends FormRequest
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
            "make" => "required|string|min:1|max:20",
            "model" => "required|string|min:1|max:20",
            "categories" => "required|array",
            "options" => "nullable|array"
        ];
    }

    public function getMake()
    {
        return $this->input('make');
    }

    public function getModel()
    {
        return $this->input('model');
    }

    public function getSelectedCategories()
    {
        return $this->input('categories');
    }

    public function getSelectedOptionsValues()
    {
        $options = $this->input('options');
        $options = array_filter($options);

        return $options;
    }

}
