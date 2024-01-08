<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeaponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'type' => $this->type,
            'name' => $this->name,
            'energy_cost' => $this->energy_cost,
        ];

        // Check if pivot data is available
        if ($this->pivot) {
            $pivotFields = [
                'arc' => $this->pivot->arc,
                'location' => $this->pivot->location,
                // Add other pivot fields here
            ];
            $data = array_merge($data, $pivotFields);
        }
        
        return $data;
    }
}
