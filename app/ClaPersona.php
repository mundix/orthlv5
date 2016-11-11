<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaPersona extends Model
{

    protected $table = 'cla-persona';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cla',  'telefono', 'celular','noficha','nofichae'
    ];
}
