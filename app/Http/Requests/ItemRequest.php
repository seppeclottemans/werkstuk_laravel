<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Image;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
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
        $itemId = $this['itemId'];
        $numberOfOldImages = Image::where('item_id', $itemId)->get()->count();
        $maxNumberOfImages = 4 - $numberOfOldImages;
        $imagesToDelete = [];
        if($this->imagesToDelete != null){
            $imagesToDelete = array_map('intval', explode(',', $this->imagesToDelete));
        }

        $rules = [
            'title' => 'required|max:30',
            'description' => 'required|min:5|max:300',
            'total_amount' => 'required|numeric|min:0|not_in:0|max:999',
            'images' => Rule::requiredIf($numberOfOldImages <= count($imagesToDelete)) . "|max:$maxNumberOfImages",
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:20000',
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
            'title.required' => 'Please fill in a title.',
            'title.max:30' => 'A title can only be 30 characters.',
            'description.required'  => 'Please fill in a description.',
            'description.min:10'  => 'A description must be at least 5 characters long.',
            'description.max:300'  => 'A description can only be 300 characters long.',
            'total_amount.required' => 'We need to know how many of these items you have availeble.',
            'total_amount.min:0' => 'Amount can not be 0.',
            'total_amount.not_in:0' => 'Amount can not be 0.',
            'total_amount.max:999' => 'Amount can not be more than 999.',
            'images.required' => 'Atleast one image is required.',
            'images.max:4' => 'You can only add 4 images per item.',
            'images.max' => 'You can only add 4 images per item.',
            'images.*.max:20000' => 'Image file(s) are to large try a smaller image.',
            'images.*.image' => 'This needs to be an image',
            'images.*.mimes:jpeg,png,jpg,svg' => 'Not a valid image extantion try a jpeg,png,jpg or svg.',
            'categories.required' => 'categories are required',
            'categories.array' => 'categories must be an array',
            'categories.min:3' => 'there need to be at least 3 categories',
            'categories.filled' => 'categories are required.',
            'categories.*.distinct' => 'categories can not be the same.',

        ];
    }

    public function getItem() {
        return [
            'title' => $this->input('title'),
            'description' => $this->input('description'),
            'current_amount' => $this->input('total_amount'),
            'total_amount' => $this->input('total_amount')
        ];
    }
}
