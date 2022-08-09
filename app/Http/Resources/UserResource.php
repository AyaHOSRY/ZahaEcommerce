<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'fullname'=> $this->fullname,
        'username' => $this->username,
        'email' => $this->email,
        'user_type'=>$this->user_type,
        'addresses' => AddressResource::collection($this->whenLoaded('addresses')),
       ];
    }
}
