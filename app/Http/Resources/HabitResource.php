<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
        public function toArray(Request $request): array
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'color' => $this->color, 
                'icon' => $this->icon,
                'repetition' => $this->repitition,
                'days' => $this->days,
                'once_in' => $this->once_in ,
                'reminder_at' => $this->reminder_at, 
            ];
        }
}
