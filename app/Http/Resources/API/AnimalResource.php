<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "name" => $this->name,
            "type" => $this->type,
            "dob" => $this->date_of_birth,
            "weight_kg" => $this->weight_kg,
            "height_m" => $this->height_m,
            "biteyness" => $this->biteyness,
            "treatments" => $this->treatments->pluck("name"),
            "owner_name" => $this->owner->fullName()
        ];
    }
}
