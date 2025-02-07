<?php

namespace App\Http\Requests\Offer;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateOfferRequest extends FormRequest
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
        return  [
            'offer_description' => 'nullable|string',
            'discount_percentage' => 'nullable|numeric|between:0,100',
            'start_date' => ['nullable','date','after_or_equal:'.now()->toDateString()],
            'end_date' => 'nullable|date|after_or_equal:start_date',
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
            'numeric' => 'The :attribute must be numeric.',
            'date'=>'The :attribute must be valied date.'

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
            'offer_description' => 'Offer Description',
            'discount_percentage' => 'Discount Percentage',
            'start_date' => 'Start Date',
            'end_date' => 'End Date'
        ];
    }

}
