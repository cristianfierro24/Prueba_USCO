<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 *
 * @property $id
 * @property $name
 * @property $address
 * @property $municipalities_id
 * @property $departaments_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Departament $departament
 * @property Municipality $municipality
 * @property Quotation[] $quotations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Office extends Model
{
    
    static $rules = [
		'name' => 'required',
		'address' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','address','municipalities_id','departaments_id'];


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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation', 'offices_id', 'id');
    }
    

}
