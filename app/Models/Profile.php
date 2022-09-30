<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $dni
 * @property $correo
 * @property $fecha_nac
 * @property $bu_pro_id
 * @property $co_pro_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Businessprofile $businessprofile
 * @property Contractprofile $contractprofile
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Profile extends Model
{
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'dni' => 'required',
		'correo' => 'required',
		'fecha_nac' => 'required',
		'bu_pro_id' => 'required',
		'co_pro_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','dni','correo','fecha_nac','bu_pro_id','co_pro_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function businessprofile()
    {
        return $this->hasOne('App\Models\Businessprofile', 'id', 'bu_pro_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contractprofile()
    {
        return $this->hasOne('App\Models\Contractprofile', 'id', 'co_pro_id');
    }
    

}
