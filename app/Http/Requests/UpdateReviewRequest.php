<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => [
                'sometimes',
                'required',
                'string',
                'max:750',
            ],
            'rating' => [
                'sometimes',
                'required',
                'numeric',
                'max:5',
                'min:1',
            ],
            'resto_id' => [
                'sometimes',
                'required',
                'numeric',
                'exists:restos,id',
            ],
        ];
    }
}
