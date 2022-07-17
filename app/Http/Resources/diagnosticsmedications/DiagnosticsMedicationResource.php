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
            'name'=>$this->name,
            'cantidad'=>$this->cantidad,
            'medications_id'=>$this->medications,
            'diagnostics_id'=>$this->diagnostics,
            'prueba'=>$this->prueba
        ];
    }
}
