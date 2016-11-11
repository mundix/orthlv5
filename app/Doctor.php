<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'cla-admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'level','status','pass'
    ];
    public $timestamps = false;

    /**
     * @params String $email
     * @params String $name
     *
     * @return Doctor
    */
    static public function add($email = null,$name= null)
    {
        if(!is_null($email) && !is_null($name))
        {

            $doctor = Doctor::where('email','=',$email)->first();
            if($doctor)
                return $doctor;
            $params = [
                'email'=>$email,
                'pass'=>'378d8f118d', //12345
                'nombre'=>$name,
                'level'=>3,
                'status'=>1,
            ];
            $doctor = Doctor::create($params);
            return $doctor;
        }
        return FALSE;
    }
}
