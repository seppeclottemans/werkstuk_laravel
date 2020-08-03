<?php

namespace App\Http\Requests;

use App\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentRequest extends FormRequest
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
        $itemId = $this->itemId;
        $item = Item::where('id', $itemId)->first();

        $rules = [
            'dateFrom' => 'required|date_format:"D M d Y"',
            'dateTo' => 'required|date_format:"D M d Y"',
            'rent_amount' => "required|numeric|min:0|not_in:0|max:" . $item->current_amount,
            'message' => "max:300"
        ];


        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'dateFrom.required' => 'Please fill in a date.',
            'dateFrom.date_format:"D M d Y"' => 'InvalidDateFormat.',
            'dateTo.required' => 'Please fill in a date.',
            'dateTo.date_format:"D M d Y"' => 'InvalidDateFormat.',
            'rent_amount.required' => 'The rent amount is required',
            'rent_amount.numeric' => 'The rent amount must be a number',
            'rent_amount.min:0' => 'The amount can not be smaller than 1',
            'rent_amount.not_in:0' => 'The amount can not be smaller than 1',
            'rent_amount.max' => 'The amount can not be bigger than items available'
        ];
    }
}
