<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctorid',
        'diaid',
        'horaid',
        'status',
    ];

    public $timestamps = false;
    static public function addFirst(Doctor $doctor)
    {
        $horario = Horario::where('doctorid','=',(int)$doctor->id)->first();
        if($horario)
            return $horario;
//        [
//            'doctorid'=>$doctor->id,
//            'diaid'=>1,
//            'horaid'=>1,
//            'status'=>1,
//        ];
        $horario = new Horario();
        $horario->doctorid = $doctor->id;
        $horario->diaid = 1;
        $horario->horaid = 1;
        $horario->status = 1;
        $horario->save();
        return $horario;
    }
}
