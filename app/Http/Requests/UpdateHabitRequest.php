<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHabitRequest extends FormRequest
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
            'id' => 'id',
            'title' => 'sometimes|required|string|max:225|min:3',  // Reading Gym
            'color' => 'sometimes|required|string', // choose a color 
            'icon' => 'sometimes|required|string', 
            'repetition' => 'sometimes|required|int', // Daily Weekly Monthly
            'days' => 'sometimes|required|string', // S M T W T F S Everyday
            'once_in' => 'sometimes|required|string', // Morning Afternoon Evening OncAtAnyTime
            'reminder_at' => 'sometimes|required|string', // 9:00am/pm
            'image' => 'sometimes|nullable|image'
        ];
    }
}
