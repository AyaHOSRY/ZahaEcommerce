<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
       return[
        
        'sub_total'=> $this->sub_total,
        'shipping'=> $this->shipping,
        'total'=> $this->total ,
        //'products'=> ProductResource::collection($this->whenLoaded('products')),

       ];
    }
}
