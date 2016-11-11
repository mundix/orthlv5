<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'doctores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'claid',
        'especialidadid', //6
    ];

    public $timestamps = false;

    /**
     * @params Doctor $doctor
     *
     * @return Especialidad
     */
    static public function add(Doctor $doctor)
    {

            $especialidad = Especialidad::where('claid','=',$doctor->id)->first();
            if($especialidad)
                return $especialidad;
            $especialidad = Especialidad::create(['claid'=>$doctor->id,'especialidadid'=>6]);
            return $especialidad;
    }
}
