<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            "id" => $this->id,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "gender" => $this->gender,
            "date_of_birth" => $this->date_of_birth,
            "date_created" => $this->created_at,
            "date_updated" => $this->updated_at
        ];
    }
}
