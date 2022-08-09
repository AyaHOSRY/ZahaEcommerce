<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      $user = $this->whenLoaded('user');
      //  return parent::toArray($request);
      return [
        'street1' => $this->street1,
        'street2' => $this->street2,
        'city'=>$this->city,
        'state'=> $this->state,
        'country'=> $this->country,
        'zip_code'=> $this->zip_code,
        'customer'=> new UserResource($this->user),
      ];
    }
}
