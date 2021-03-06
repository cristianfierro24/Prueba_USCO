<?php

namespace App\Http\Resources\offices;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeResource extends JsonResource
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
            'address'=>$this->address,
            'municipalities_id'=>$this->municipalities_id,
            'departaments_id'=>$this->departaments_id,
            'prueba'=>$this->prueba
        ];
    }
}
