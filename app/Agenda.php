<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public $timestamps = false;
    protected $table = 'agenda';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'claid', 'fecha', 'horarioid','status'
    ];
}
