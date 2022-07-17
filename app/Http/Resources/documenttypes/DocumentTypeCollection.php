<?php

namespace App\Http\Resources\documenttypes;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentTypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'prueba' => 'PruebaUsco',
                'authors' => [
                    'Cristian Fierro'
                ],
            ]
        ];
    }
}
