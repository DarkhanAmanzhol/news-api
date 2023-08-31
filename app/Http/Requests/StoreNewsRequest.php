<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:news_categories,id'],
            'header' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:4294967295'],
            'preview' => ['required', 'string', 'max:65535'],
            'date_published' => ['date_format:Y-m-d'],
        ];
    }
}
