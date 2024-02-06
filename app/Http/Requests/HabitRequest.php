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
            'title' => 'required|string|max:225|min:3',  // Reading Gym
            'color' => 'required|string', // choose a color 
            'icon' => 'required|string', // will be like a class
            'repetition' => 'required|int', // Daily:1 Weekly:7 Monthly:30
            'days' => 'required|string', // S M T W T F S Everyday
            'once_in' => 'required|string', // Morning Afternoon Evening OncAtAnyTime
            'reminder_at' => 'required|string', // 9:00am/pm
            'image' => 'nullable|image'
        ];
    }
}
