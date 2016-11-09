<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Cla;
use App\ClaPersona;

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
        \Excel::load($fileName, function($reader){
//            return $reader;
            echo "<pre>";
            $reader->sheet('pacientes',function($sheet)
            {
//                return $sheet;
//                    echo "X";
                foreach ($sheet->toArray() as  $key=>$row)
                {
                    print_r($row);
                    list($code,$fullName,$phone,$cellphone,$doctorName,$date) = $row;
                    $persona = [
                        ''=>'',
                    ];
                    Cla::create();
                }
            });
        });
    }
}
