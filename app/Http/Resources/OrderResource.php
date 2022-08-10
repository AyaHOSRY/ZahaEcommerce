<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
        //'customer'=> new UserBuyerResource($this->user),
        'customer'=> new UserBuyerResource($this->user) ,
        'sub_total'=> $this->sub_total,
        'shipping'=> $this->shipping,
        'total'=> $this->total ,
        'addresse' => $this->user->addresses,
        ];
    }
}
