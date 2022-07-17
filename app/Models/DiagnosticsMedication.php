<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiagnosticsMedication
 *
 * @property $id
 * @property $quantity
 * @property $medications_id
 * @property $diagnostics_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Diagnostic $diagnostic
 * @property Medication $medication
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiagnosticsMedication extends Model
{
    
    static $rules = [
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','medications_id','diagnostics_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function diagnostic()
    {
        return $this->hasOne('App\Models\Diagnostic', 'id', 'diagnostics_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medication()
    {
        return $this->hasOne('App\Models\Medication', 'id', 'medications_id');
    }
    

}
