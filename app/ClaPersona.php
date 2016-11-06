<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaPersona extends Model
{
    //
    protected $table = 'cla-persona';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
