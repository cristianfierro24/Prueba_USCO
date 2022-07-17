<?php

namespace App\Http\Resources\departaments;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartamentCollection extends ResourceCollection
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
