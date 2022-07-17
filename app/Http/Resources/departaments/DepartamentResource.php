<?php

namespace App\Http\Resources\departaments;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartamentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'prueba'=>$this->prueba
        ];
    }
}
