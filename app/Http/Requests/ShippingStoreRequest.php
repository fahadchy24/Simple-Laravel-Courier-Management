<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingStoreRequest extends FormRequest
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
            'rule_name' => 'required|string|unique:shipping_costs,rule_name',
            'delivery_route' => 'required|integer',
            'delivery_type' => 'required|integer',
            'weight' => 'required|integer',
            'expiry_date' => 'required|date_format:Y-m-d',
            'cost' => 'required|integer'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function customMessages()
    {
        return [
            'rule_name.required' => 'The Rule Name is required.',
            'rule_name.unique' => 'The Rule Name has been used already.',
            'rule_name.string' => 'The Rule Name is invalid.',
            'delivery_route.required' => 'Delivery Route is required',
            'delivery_route.integer' => 'Delivery Route is invalid',
            'delivery_type.required' => 'Delivery Type is required',
            'delivery_type.integer' => 'Delivery Type is invalid',
            'weight.required' => 'Weight is required',
            'weight.integer' => 'Weight is invalid',
            'expiry_date.required' => 'Expiry Date is required',
            'expiry_date.date_format' => 'Invalid Date Format',
            'cost.required' => 'Cost is required',
            'cost.integer' => 'Cost is invalid'
        ];
    }
}
