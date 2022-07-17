<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipality
 *
 * @property $id
 * @property $name
 * @property $departaments_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Departament $departament
 * @property Office[] $offices
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipality extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','departaments_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departament()
    {
        return $this->hasOne('App\Models\Departament', 'id', 'departaments_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offices()
    {
        return $this->hasMany('App\Models\Office', 'municipalities_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'municipalities_id', 'id');
    }
    

}
