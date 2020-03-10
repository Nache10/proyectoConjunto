<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Conexion extends Model
{
    protected $table = 'conexion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idpuntoacceso', 'fecha', 'hora', 'mac',
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
    
    public function puntoacceso() {
        return $this->belongsTo('App\puntoacceso', 'id');
    }
}
