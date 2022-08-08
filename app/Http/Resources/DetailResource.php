<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
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
      return [
        'id'=>$this->id,
        'key'=> $this->key,
        'value'=> $this->value,
        'department_id'=>$this->department_id
       //'department'=> DepartmentResource::collection($this->department),

      ];
    }
}
