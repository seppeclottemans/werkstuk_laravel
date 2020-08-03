<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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

        $rules = [
            'name' => 'required|string|max:255',
            'profileImage' => 'image|mimes:jpeg,png,jpg,svg|max:20000',
            'categories' => 'required|array',
            'categories.*' => 'required|distinct|exists:categories,name'
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
            'name.required' => 'Please fill in your name.',
            'name.max:255' => 'Your name can only be 255 characters.',
            'profileImage.max:20000' => 'Image file(s) are to large try a smaller image.',
            'profileImage.image' => 'This needs to be an image',
            'profileImage.mimes:jpeg,png,jpg,svg' => 'Not a valid image extension try a jpeg,png,jpg or svg.',
        ];
    }
}
