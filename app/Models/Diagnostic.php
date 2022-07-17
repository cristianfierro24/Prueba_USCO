<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diagnostic
 *
 * @property $id
 * @property $description
 * @property $quotations_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DiagnosticsMedication[] $diagnosticsMedications
 * @property Quotation $quotation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diagnostic extends Model
{
    
    static $rules = [
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','quotations_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diagnosticsMedications()
    {
        return $this->hasMany('App\Models\DiagnosticsMedication', 'diagnostics_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation', 'id', 'quotations_id');
    }
    

}
