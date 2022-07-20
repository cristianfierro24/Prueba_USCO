<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quotation
 *
 * @property $id
 * @property $name
 * @property $gender
 * @property $birthdate
 * @property $document_number
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $last_names
 * @property $address
 * @property $phone
 * @property $salary
 * @property $taxes
 * @property $document_types_id
 * @property $profiles_id
 * @property $municipalities_id
 * @property $departaments_id
 * 
 *
 * @property Municipality[] $municipalities
 * @property Departament[] $departament
 * @property Profile[] $municipalities 
 * @property Quotation[] $municipalities
 * @property DocumentType[] $municipalities
 * 
 * 
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender','birthdate',
        'document_number',
        'last_names','address','phone','salary','taxes'
    ];

   
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static $rules = [
        'name'=>'required',
        'email'=> 'required', 'unique:users',
        'password'=> 'required',
		'gender' => 'required',
		'birthdate' => 'date',
		'document_number' => 'required',
		'last_names' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'salary' => 'decimal',
        'taxes' => 'decimal',
    ];

    protected $perPage = 20;

    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departament()
    {
        return $this->hasOne('App\Models\Departament', 'id', 'departaments_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipality()
    {
        return $this->hasOne('App\Models\Municipality', 'id', 'municipalities_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documentType()
    {
        return $this->hasOne('App\Models\documentType', 'id', 'document_types_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\documentType', 'id', 'document_types_id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\Quotation', 'id', 'users_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctor()
    {
        return $this->hasMany('App\Models\Quotation', 'id', 'doctors_id');
    }

    public function paciente()
    {
        return $this->hasMany('App\Models\Quotation', 'id', 'pacients_id');
    }
}
