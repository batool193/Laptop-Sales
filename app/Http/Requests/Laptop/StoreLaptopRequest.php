<?php

namespace App\Http\Requests\Laptop;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class StoreLaptopRequest extends FormRequest
{
      /**
     * Indicates if the validator should stop on the first rule failure
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }
    /**
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
       return $rules = [
        'brand' => 'required|string|max:100',
        'serial_number' => 'required|string|max:255|unique:laptops,serial_number',
        'processor' => 'required|string|max:100',
        'ram' => 'required|string|max:100',
        'storage' => 'required|string|max:100',
        'color' => 'required|string|max:50',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0|max:999999.99',
        ];
    }


    /**
     * Get the custom messages for validator errors
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute is required.',
            'string'=>'the :attribute must be string',
            'unique'=>'the :attribute already exists',
            'numeric' => 'The :attribute must be numeric.',
        ];
    }
    /**
     * Get custom attributes for validator errors
     *
     * @return array
     */

    public function attributes()
    {
        return [
            'brand' => 'Laptop Brand',
            'serial_number' => 'Laptop Serial Number',
            'processor' => 'Processor',
            'ram' => 'RAM',
            'storage' => 'Storage',
            'color' => 'Color',
            'description' => 'Description',
            'price' => 'Price',

        ];
}
}
