<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractprofile extends Model
{
    static $rules = [
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_inicio','fecha_fin','tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->hasMany('App\Models\Profile', 'co_pro_id', 'id');
    }
}
