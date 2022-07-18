<?php

namespace App\Http\Resources\diagnosticsmedications;

use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticsMedicationResource extends JsonResource
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
            'quantity'=>$this->quantity,
            'medications_id'=>$this->medications_id,
            'diagnostics_id'=>$this->diagnostics_id,
            'prueba'=>$this->prueba
        ];
    }
}
