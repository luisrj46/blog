<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'titulo'=>$this->resource->title,
            'owner'=>['nombre'=>$this->resource->owner->name,"email"=>$this->resource->owner->email,],
            'category'=>$this->resource->category->name
        ];
    }
}
