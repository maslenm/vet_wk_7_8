<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // just show the id, fullname method, fulladdress method and formatted telephone number method 
        // $this represents the current owner
        return [
            "id" => $this->id,
            "full_name" => $this->fullName(), 
            "full_address" => $this->fullAddress(),
            "telephone" => $this->formattedPhoneNumber()
        ];
    }
}
