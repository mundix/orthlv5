<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Especialidad;
use Illuminate\Http\Request;
//use Carbon\Carbon;
use App\Cla;
use App\ClaPersona;
use App\Horario;
use App\Agenda;

class controls extends Controller
{
    function __construct()
    {
        set_time_limit(60*8); //60 seconds = 1 minute
//        ini_set('memory_limit', '128M');
//        Carbon::setLocale('es');
    }
    public function index(){
        $fileName = "historial.xlsx";
        $fileName = "pacientesa.xlsx";
        echo "Comenzamos: <br/>";
        \Excel::load($fileName, function($reader){
//            return $reader;
//            echo "<pre>";
            $reader->sheet('pacientes',function($sheet)
            {
//                return $sheet;
//                    echo "X";
                foreach ($sheet->toArray() as  $key=>$row)
                {
                    print_r($row);
                    list($code,$fullName,$phone,$cellphone,$doctorName,$date) = $row;
                    $persona = [
                        'nombre'=>$fullName,
                        'level'=>1,
                        'status'=>1
                    ];
                    $person = Cla::create($persona);
                    $datos = [
                        'cla'=>$person->id,
                        'telefono'=>$phone,
                        'celular'=>$cellphone,
                        'noficha'=>$code,
                        'nofichae'=>$code,
                    ];
                    ClaPersona::create($datos);
//                    Los doctores son status 3
                    $doctorEmail = strtolower(trim(str_replace(" ","",$doctorName)));
                    if(!empty($doctorEmail))
                    {

                        $doctor = Doctor::add($doctorEmail,$doctorName);
                        $especialidad = Especialidad::add($doctor);
                        $horario = Horario::addFirst( $doctor);
                    }else
                    {
                        $doctor = Doctor::add("sinasignar","SIN ASIGNAR");
                        $especialidad = Especialidad::add($doctor);
                        $horario = Horario::addFirst( $doctor);
                    }
                    if(!empty(trim($date)) && $date != "NO LLAMAR")
                    {

                    Agenda::create([
                        'claid'=>$person->id,
                        'fecha'=>$date,
                        'horarioid'=>$horario->id,
                        'status'=>1,
                    ]);
                    }
                    echo "<br/>";


//                    echo $person->id;
//                    echo "<br/>";
                }
            });
        });
        echo "Terminamos. <br/>";
    }
}
