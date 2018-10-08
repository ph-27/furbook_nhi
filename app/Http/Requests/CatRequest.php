<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y-m-d"',
            'breed_id' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'    => 'Trường :attribute là bắt buộc',
            'max'         => 'Trường :attribute tối đa là :max kí tự',
            'numeric'     => 'Trường bắt buộc :attribute là kiểu số nguyên',
            'date_format' => 'Trường :attribute format không đúng định dạng :format',
        ];
    }
}
