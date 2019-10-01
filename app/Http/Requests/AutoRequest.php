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
            "model" => "required|string|min:1|max:20"
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

}
