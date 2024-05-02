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
            'color' => 'required|string',
            //'icon' => 'required|image',
            'repetition' => 'required|int',
            'days' => 'required|date',
            'once_in' => 'required|date',
            'reminder_at' => 'required|date',
        ];
}
}
