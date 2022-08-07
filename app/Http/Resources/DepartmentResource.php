<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
      if($this->parent_id == 0)
      return [
        'id' => $this->id,
        'department'=> $this->name,
        'categories'=>  ChildrenResource::collection($this->childrens)
      ];
      /*return [
        'id' => $this->id,
        'category'=> $this->name,
      ];*/
    }
}
