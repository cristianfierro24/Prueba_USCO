<?php

namespace App\Http\Resources\users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'gender'=>$this->gender,
            'birthdate'=>$this->birthdate,
            'document_number'=>$this->document_number,
            'email'=>$this->email,
            'email_verified_at'=>$this->email_verified_at,
            'password'=>$this->password,
            'last_names'=>$this->last_names,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'salary'=>$this->salary,
            'taxes'=>$this->taxes,
            'document_types_id'=>$this->document_types_id,
            'profiles_id'=>$this->profiles_id,
            'municipalities_id'=>$this->municipalities_id,
            'departaments_id'=>$this->departaments_id,
            'prueba'=>$this->prueba
        ];
    }
}
