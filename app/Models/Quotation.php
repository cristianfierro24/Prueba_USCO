<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quotation
 *
 * @property $id
 * @property $date_init_quotations
 * @property $date_end_quotations
 * @property $justification
 * @property $status
 * @property $users_id
 * @property $offices_id
 * @property $doctors_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Diagnostic[] $diagnostics
 * @property Office $office
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Quotation extends Model
{
    
    static $rules = [
		'date_init_quotations' => 'required',
		'date_end_quotations' => 'required',
		'justification' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_init_quotations','date_end_quotations','justification','status','users_id','offices_id','doctors_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diagnostics()
    {
        return $this->hasMany('App\Models\Diagnostic', 'quotations_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function office()
    {
        return $this->hasOne('App\Models\Office', 'id', 'offices_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    
   
    

}
