<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cla extends Model
{
    protected $table = 'cla';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'level', 'status',
    ];
}
