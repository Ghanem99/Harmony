<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitRequest extends FormRequest
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
            'icon' => 'required|image', 
            'repetition' => 'required|int', 
            'days' => 'required|string|in:S,M,T,W,T,F,S,Everyday', 
            'once_in' => 'required|string|in:Morning,Afternoon, Evening, OncAtAnyTime', 
            'reminder_at' => 'required|date', 
        ];
    }
}
