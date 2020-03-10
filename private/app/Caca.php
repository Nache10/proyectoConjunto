<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caca extends Model
{
    protected $table = 'caca';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idpuntoacceso', 'fecha', 'hora', 'mac',
    ];


}
