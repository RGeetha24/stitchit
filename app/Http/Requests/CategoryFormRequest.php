<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'uuid' => ['required'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:255'],
            'meta_keywords' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:0,1,2'],
            'sort_order' => ['required', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'uuid' => Str::uuid(),
            'status' => $this->status == '1' ? '1' : '0',
        ]);
    }
}
