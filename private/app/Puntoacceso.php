<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntoacceso extends Model
{
    
    protected $table='puntoacceso';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser', 'modelo', 'ubicacion', 'latitud', 'longitud','fechaalta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
    public function conexion() {
        return $this->hasMany('App\conexion');
    }
}
