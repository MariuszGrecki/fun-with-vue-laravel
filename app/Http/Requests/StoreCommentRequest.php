<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isGuest = ! $this->user();

        return [
            'body' => ['required', 'string', 'min:1', 'max:500'],
            'author_name' => [Rule::requiredIf($isGuest), 'nullable', 'string', 'max:255'],
            'email' => [Rule::requiredIf($isGuest), 'nullable', 'email'],
        ];
    }
}
