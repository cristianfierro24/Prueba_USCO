<?php

namespace App\Http\Resources\diagnostics;

use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticResource extends JsonResource
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
            'description'=>$this->description,
            'quotations_id'=>$this->quotations_id,
            'prueba'=>$this->prueba
        ];
    }
}
