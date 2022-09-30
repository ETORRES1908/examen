<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businessprofile extends Model
{
    static $rules = [
		'area' => 'required',
		'cargo' => 'required',
		'local' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['area','cargo','local'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->hasMany('App\Models\Profile', 'bu_pro_id', 'id');
    }
}
