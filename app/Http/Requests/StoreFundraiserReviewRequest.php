<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreFundraiserReviewRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required|integer|between:1,5',
            'review' => 'required',
            'user_id' => [
                'required',
                //this makes sure there's only 1 review per user per fundraiser
                Rule::unique('fundraiser_reviews')->where('fundraiser_id', $this->fundraiser_id)
            ]
        ];
    }
}
