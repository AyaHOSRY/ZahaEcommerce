<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       $occasion = $this->whenLoaded('occasion');
       return [
       'name' => $this->name,
       'price' => $this->price,
       'description'=>$this->description,
       'count'=> $this->count,
       'rate'=> $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count()) : 'No Rate Yet',
       'discount'=> $this->discount,
       'occasion'=> new OccasionResource($this->occasion),
       'department'=> new DepartmentResource($this->department),
       'seller'=> new UserResource($this->user),
       
       'link'=> [
         'reviews'=>route('reviews.index' , $this->id),
       ]

       ];
    }
}
