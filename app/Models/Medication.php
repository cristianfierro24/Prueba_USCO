<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medication
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property DiagnosticsMedication[] $diagnosticsMedications
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medication extends Model
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
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diagnosticsMedications()
    {
        return $this->hasMany('App\Models\DiagnosticsMedication', 'medications_id', 'id');
    }
    

}
