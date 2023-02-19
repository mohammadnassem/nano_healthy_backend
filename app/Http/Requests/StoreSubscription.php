<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscription extends FormRequest
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
            'name' => ['nullable', 'string'],
            'email' => ['required', 'email','unique:subscriptions,email'],
            'mobile' => ['nullable', 'string', 'digits:10'],
            'gender' => ['nullable', 'bool'],
            'address' => ['nullable', 'string'],
        ];
    }
}
