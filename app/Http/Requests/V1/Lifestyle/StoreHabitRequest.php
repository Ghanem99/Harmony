<?php

namespace App\Http\Requests\V1\Lifestyle;

use Illuminate\Foundation\Http\FormRequest;

class StoreHabitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:225|min:3',
            'color' => 'string',
            'icon' => 'image',
            'repetition' => 'int',
            'days' => 'date',
            'once_in' => 'date',
            'reminder_at' => 'date',
        ];
}
}
