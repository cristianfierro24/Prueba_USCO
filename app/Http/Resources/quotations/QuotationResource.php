<?php

namespace App\Http\Resources\quotations;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
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
            'date_init_quotations'=>$this->date_init_quotations,
            'date_end_quotations'=>$this->date_end_quotations,
            'justification'=>$this->justification,
            'status'=>$this->status,
            'users_id'=>$this->users_id,
            'offices_id'=>$this->offices_id,
            'doctors_id'=>$this->doctors_id,
            'prueba'=>$this->prueba
        ];
    }
}
