<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Activo;
use App\User;
use App\Conexion;
use App\Puntoacceso;
use App\Caca;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    
    static function checkmac($mac, $time){

        $conexiones = Conexion::all();
        foreach($conexiones as $conexion){
            if($conexion->mac === $mac && $conexion->created_at->diffInSeconds(Carbon::now()) < $time){
                return false;
            }
        }
        return true;
    }
    
    public function conexionespacceso(){
        
        return response()->json([
                'labelsGraph1' =>   self::getFromtable('modelo','puntoacceso'),
                'countGraph1'=>  self::getCount('idpuntoacceso'),
        ]);
    }
    
    function data(Request $request){

        $insercion = '';
        $activos = Activo::all();
        $idpuntoacceso = $request->input('idpuntoacceso');
        $mac = $request->input('mac');
        $fecha = $request->input('fecha');
        $fecha .= $request->input('hora');
        $date = Carbon::parse($fecha);
        
        foreach($activos as $activo){
            $nachoinicio = $activo->fechainicial;
            $nachoinicio .= $activo->horainicial;
            $dateini = Carbon::parse($nachoinicio);
            
            $nachofinal = $activo->fechafinal;
            $nachofinal .= $activo->horafinal;
            $datefin = Carbon::parse($nachofinal);
            
            if($date->gt($dateini) && $date->lt($datefin) && Puntoacceso::find($idpuntoacceso) && self::checkmac($mac,$activo->periodominimo)){
                
                $conexion = new Conexion($request->all());
                try{
                    $conexion->save();
                    $insercion = 'conexion';
                } catch(\Exception $e){
                    return response()->json([
                        'datos' => 'fallo de insercion',
                        'bicho' => $conexion,
                        'error' => $e,
                    ]);
                }
            } else {
                $caca = new Caca($request->all());
                try{
                    $caca->save();
                    $insercion = 'caca';
                } catch(\Exception $e){
                    return response()->json([
                        'datos' => 'fallo de insercion de caca',
                        'bicho' => $conexion,
                        'error' => $e,
                    ]);
                }
            }

        }
        
        // $llega = file_put_contents( 'datos.txt' , $request->getContent(), FILE_APPEND | LOCK_EX );
        // una vez que checkeamos el formato no nos hace falta para este proyecto.
        
        return response()->json([
                'pa' => Puntoacceso::find($idpuntoacceso),
                'insercion' => $insercion,
        ]);
    }
    
    public function getCount(string $campo){ 
        $counts = DB::select('Select count(*) as count from conexion group by '.$campo.' order by '.$campo.' asc');
        $array = [];
        foreach($counts as $count){
            array_push($array,$count->count);
        }
        return $array;
    }
    
    public function getFromtable(string $campo, string $tabla){
        
        $array = [];
        $cursores = \DB::table($tabla)->groupBy($campo)->get($campo)->toArray();
        foreach($cursores as $cursor){
            array_push($array, $cursor->$campo);
        }
        return $array;
    }
    //metodos de ranking
    public function getrankingday(){
        $totales = \DB::select("select distinct fecha from conexion order by fecha asc");
        $fechastotales = [];
        foreach($totales as $total){
            array_push($fechastotales,$total->fecha);
        }
        $hoy = Carbon::now()->format('Y-m-d');
        $ayer = Carbon::now()->subDays(1)->format('Y-m-d');
        $conexiones = \DB::select("Select mac, count(*) as count from conexion where fecha between'".$ayer."'and'".$hoy."'group by mac order by count desc limit 5");
        if(isset($conexiones[0])){
            $top1 = \DB::select("Select * from conexion where mac = '".$conexiones[0]->mac."' and fecha between'".$ayer."'and'".$hoy."'");
            $fechas1 = [];
            $mac= '';
            foreach($top1 as $valor){
                array_push($fechas1,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas1 as $fecha1){
                    if($fechatotal === $fecha1){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top1 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top1 = null;
        }
        if(isset($conexiones[1])){
            $top2 = \DB::select("Select * from conexion where mac = '".$conexiones[1]->mac."' and fecha between'".$ayer."'and'".$hoy."'");
            $fechas2 = [];
            $mac= '';
            foreach($top2 as $valor){
                array_push($fechas2,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas2 as $fecha2){
                    if($fechatotal === $fecha2){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top2 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top2 = null;
        }
        if(isset($conexiones[2])){
            $top3 = \DB::select("Select * from conexion where mac = '".$conexiones[2]->mac."' and fecha between'".$ayer."'and'".$hoy."'");
            $fechas3 = [];
            $mac= '';
            foreach($top3 as $valor){
                array_push($fechas3,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas3 as $fecha3){
                    if($fechatotal === $fecha3){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top3 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top3 = null;
        }
        if(isset($conexiones[3])){
            $top4 = \DB::select("Select * from conexion where mac = '".$conexiones[3]->mac."' and fecha between'".$ayer."'and'".$hoy."'");
            $fechas4 = [];
            $mac= '';
            foreach($top4 as $valor){
                array_push($fechas4,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas4 as $fecha4){
                    if($fechatotal === $fecha4){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top4 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top4 = null;
        }
        if(isset($conexiones[4])){
            $top5 = \DB::select("Select * from conexion where mac = '".$conexiones[4]->mac."' and fecha between'".$ayer."'and'".$hoy."'");
            $fechas5 = [];
            $mac= '';
            foreach($top5 as $valor){
                array_push($fechas5,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas5 as $fecha5){
                    if($fechatotal === $fecha5){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top5 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top5 = null;
        }
        
        return response()->json([
            'conexiones' => $conexiones,
            'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'top5' => $top5,
            'fechaslabel' => $fechastotales,
            
        ]);
        
    }
    public function getrankingweek(){
        $totales = \DB::select("select distinct fecha from conexion order by fecha asc");
        $fechastotales = [];
        foreach($totales as $total){
            array_push($fechastotales,$total->fecha);
        }
        $hoy = Carbon::now()->format('Y-m-d');
        $semana = Carbon::now()->subDays(7)->format('Y-m-d');
        $conexiones = \DB::select("Select mac, count(*) as count from conexion where fecha between'".$semana."'and'".$hoy."'group by mac order by count desc limit 5");
        
        if(isset($conexiones[0])){
            $top1 = \DB::select("Select * from conexion where mac = '".$conexiones[0]->mac."' and fecha between'".$semana."'and'".$hoy."'");
            $fechas1 = [];
            $mac= '';
            foreach($top1 as $valor){
                array_push($fechas1,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas1 as $fecha1){
                    if($fechatotal === $fecha1){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top1 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top1 = null;
        }
        if(isset($conexiones[1])){
            $top2 = \DB::select("Select * from conexion where mac = '".$conexiones[1]->mac."' and fecha between'".$semana."'and'".$hoy."'");
            $fechas2 = [];
            $mac= '';
            foreach($top2 as $valor){
                array_push($fechas2,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas2 as $fecha2){
                    if($fechatotal === $fecha2){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top2 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top2 = null;
        }
        if(isset($conexiones[2])){
            $top3 = \DB::select("Select * from conexion where mac = '".$conexiones[2]->mac."' and fecha between'".$semana."'and'".$hoy."'");
            $fechas3 = [];
            $mac= '';
            foreach($top3 as $valor){
                array_push($fechas3,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas3 as $fecha3){
                    if($fechatotal === $fecha3){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top3 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top3 = null;
        }
        if(isset($conexiones[3])){
            $top4 = \DB::select("Select * from conexion where mac = '".$conexiones[3]->mac."' and fecha between'".$semana."'and'".$hoy."'");
            $fechas4 = [];
            $mac= '';
            foreach($top4 as $valor){
                array_push($fechas4,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas4 as $fecha4){
                    if($fechatotal === $fecha4){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top4 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top4 = null;
        }
        if(isset($conexiones[4])){
            $top5 = \DB::select("Select * from conexion where mac = '".$conexiones[4]->mac."' and fecha between'".$semana."'and'".$hoy."'");
            $fechas5 = [];
            $mac= '';
            foreach($top5 as $valor){
                array_push($fechas5,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas5 as $fecha5){
                    if($fechatotal === $fecha5){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top5 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top5 = null;
        }
        
        
        return response()->json([
            'conexiones' => $conexiones,
            'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'top5' => $top5,
            'fechaslabel' => $fechastotales,
            
        ]);
    }
    public function getrankingmonth(){
        $totales = \DB::select("select distinct fecha from conexion order by fecha asc");
        $fechastotales = [];
        foreach($totales as $total){
            array_push($fechastotales,$total->fecha);
        }
        
        $hoy = Carbon::now()->format('Y-m-d');
        $mes = Carbon::now()->subDays(30)->format('Y-m-d');
        $conexiones = \DB::select("Select mac, count(*) as count from conexion where fecha between'".$mes."'and'".$hoy."'group by mac order by count desc limit 5");
        
        if(isset($conexiones[0])){
            $top1 = \DB::select("Select * from conexion where mac = '".$conexiones[0]->mac."' and fecha between'".$mes."'and'".$hoy."'");
            $fechas1 = [];
            $mac= '';
            foreach($top1 as $valor){
                array_push($fechas1,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas1 as $fecha1){
                    if($fechatotal === $fecha1){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top1 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top1 = null;
        }
        if(isset($conexiones[1])){
            $top2 = \DB::select("Select * from conexion where mac = '".$conexiones[1]->mac."' and fecha between'".$mes."'and'".$hoy."'");
            $fechas2 = [];
            $mac= '';
            foreach($top2 as $valor){
                array_push($fechas2,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas2 as $fecha2){
                    if($fechatotal === $fecha2){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top2 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top2 = null;
        }
        if(isset($conexiones[2])){
            $top3 = \DB::select("Select * from conexion where mac = '".$conexiones[2]->mac."' and fecha between'".$mes."'and'".$hoy."'");
            $fechas3 = [];
            $mac= '';
            foreach($top3 as $valor){
                array_push($fechas3,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas3 as $fecha3){
                    if($fechatotal === $fecha3){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top3 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top3 = null;
        }
        if(isset($conexiones[3])){
            $top4 = \DB::select("Select * from conexion where mac = '".$conexiones[3]->mac."' and fecha between'".$mes."'and'".$hoy."'");
            $fechas4 = [];
            $mac= '';
            foreach($top4 as $valor){
                array_push($fechas4,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas4 as $fecha4){
                    if($fechatotal === $fecha4){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top4 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top4 = null;
        }
        if(isset($conexiones[4])){
            $top5 = \DB::select("Select * from conexion where mac = '".$conexiones[4]->mac."' and fecha between'".$mes."'and'".$hoy."'");
            $fechas5 = [];
            $mac= '';
            foreach($top5 as $valor){
                array_push($fechas5,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas5 as $fecha5){
                    if($fechatotal === $fecha5){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top5 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top5 = null;
        }
        
        return response()->json([
            'conexiones' => $conexiones,
            'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'top5' => $top5,
            'fechaslabel' => $fechastotales,
            
        ]);
    }
    public function getrankingyear(){
        $totales = \DB::select("select distinct fecha from conexion order by fecha asc");
        $fechastotales = [];
        foreach($totales as $total){
            array_push($fechastotales,$total->fecha);
        }
        $hoy = Carbon::now()->format('Y-m-d');
        $ano = Carbon::now()->subDays(365)->format('Y-m-d');
        $conexiones = \DB::select("Select mac, count(*) as count from conexion where fecha between'".$ano."'and'".$hoy."'group by mac order by count desc limit 5");        
        
        if(isset($conexiones[0])){
            $top1 = \DB::select("Select * from conexion where mac = '".$conexiones[0]->mac."' and fecha between'".$ano."'and'".$hoy."'");
            $fechas1 = [];
            $mac= '';
            foreach($top1 as $valor){
                array_push($fechas1,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas1 as $fecha1){
                    if($fechatotal === $fecha1){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top1 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top1 = null;
        }
        if(isset($conexiones[1])){
            $top2 = \DB::select("Select * from conexion where mac = '".$conexiones[1]->mac."' and fecha between'".$ano."'and'".$hoy."'");
            $fechas2 = [];
            $mac= '';
            foreach($top2 as $valor){
                array_push($fechas2,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas2 as $fecha2){
                    if($fechatotal === $fecha2){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top2 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top2 = null;
        }
        if(isset($conexiones[2])){
            $top3 = \DB::select("Select * from conexion where mac = '".$conexiones[2]->mac."' and fecha between'".$ano."'and'".$hoy."'");
            $fechas3 = [];
            $mac= '';
            foreach($top3 as $valor){
                array_push($fechas3,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas3 as $fecha3){
                    if($fechatotal === $fecha3){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top3 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top3 = null;
        }
        if(isset($conexiones[3])){
            $top4 = \DB::select("Select * from conexion where mac = '".$conexiones[3]->mac."' and fecha between'".$ano."'and'".$hoy."'");
            $fechas4 = [];
            $mac= '';
            foreach($top4 as $valor){
                array_push($fechas4,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas4 as $fecha4){
                    if($fechatotal === $fecha4){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top4 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top4 = null;
        }
        if(isset($conexiones[4])){
            $top5 = \DB::select("Select * from conexion where mac = '".$conexiones[4]->mac."' and fecha between'".$ano."'and'".$hoy."'");
            $fechas5 = [];
            $mac= '';
            foreach($top5 as $valor){
                array_push($fechas5,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas5 as $fecha5){
                    if($fechatotal === $fecha5){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top5 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top5 = null;
        }
        
        
        return response()->json([
            'conexiones' => $conexiones,
            'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'top5' => $top5,
            'fechaslabel' => $fechastotales,
            
        ]);
    }
    public function getrankingever(){
        $totales = \DB::select("select distinct fecha from conexion order by fecha asc");
        $fechastotales = [];
        foreach($totales as $total){
            array_push($fechastotales,$total->fecha);
        }

        $conexiones = \DB::select('Select mac, count(*) as count from conexion group by mac order by count desc limit 5');
        
        if(isset($conexiones[0])){
            $top1 = \DB::select("Select * from conexion where mac = '".$conexiones[0]->mac."'");
            $fechas1 = [];
            $mac= '';
            foreach($top1 as $valor){
                array_push($fechas1,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas1 as $fecha1){
                    if($fechatotal === $fecha1){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top1 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top1 = null;
        }
        if(isset($conexiones[1])){
            $top2 = \DB::select("Select * from conexion where mac = '".$conexiones[1]->mac."'");
            $fechas2 = [];
            $mac= '';
            foreach($top2 as $valor){
                array_push($fechas2,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas2 as $fecha2){
                    if($fechatotal === $fecha2){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top2 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top2 = null;
        }
        if(isset($conexiones[2])){
            $top3 = \DB::select("Select * from conexion where mac = '".$conexiones[2]->mac."'");
            $fechas3 = [];
            $mac= '';
            foreach($top3 as $valor){
                array_push($fechas3,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas3 as $fecha3){
                    if($fechatotal === $fecha3){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top3 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top3 = null;
        }
        if(isset($conexiones[3])){
            $top4 = \DB::select("Select * from conexion where mac = '".$conexiones[3]->mac."'");
            $fechas4 = [];
            $mac= '';
            foreach($top4 as $valor){
                array_push($fechas4,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas4 as $fecha4){
                    if($fechatotal === $fecha4){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top4 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top4 = null;
        }
        if(isset($conexiones[4])){
            $top5 = \DB::select("Select * from conexion where mac = '".$conexiones[4]->mac."'");
            $fechas5 = [];
            $mac= '';
            foreach($top5 as $valor){
                array_push($fechas5,$valor->fecha);
                $mac = $valor->mac;
            }
            $fechasreales = [];
            foreach($fechastotales as $fechatotal){
                $contadorfechas = 0;
                foreach($fechas5 as $fecha5){
                    if($fechatotal === $fecha5){
                        $contadorfechas ++;
                    }
                }
                array_push($fechasreales , $contadorfechas);
            }
            $top5 = ['fechas' => $fechasreales,'mac' => $mac];
        } else {
            $top5 = null;
        }
        
        return response()->json([
            'conexiones' => $conexiones,
            'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'top5' => $top5,
            'fechaslabel' => $fechastotales,
            
        ]);
    }
    
    public function rankingchart(){
        $labelsGraph1 = [1,1,1,1,1];
        $countGraph1 = [1,1,1,1,1];
        return response()->json([
                'labelsGraph1' =>   $labelsGraph1,
                'countGraph1'=>  $countGraph1,
        ]);
    }
    public function markers(){
        $puntosaceso = Puntoacceso::all();
        
        return response()->json([
            'puntos' =>   $puntosaceso,
        ]);
    }
    
    public function access1(Request $request){
        $pa = Puntoacceso::where('modelo',$request->input('modelo'))->first();
        $fechasNoarray = \DB::select("Select distinct fecha from conexion where idpuntoacceso = '".$pa->id."' order by fecha");
        $fechastotales = \DB::select("Select fecha from conexion where idpuntoacceso = '".$pa->id."' order by fecha");
        $fechas = [];
        $cuenta = [];
        foreach($fechasNoarray as $fecha){
            array_push($fechas, $fecha->fecha);
            $valor = 0;
            foreach($fechastotales as $fechatotal){
                if($fechatotal->fecha === $fecha->fecha){
                    $valor++;
                }
            }
            array_push($cuenta,$valor);
        }
        
        // $count = \DB::select("Select distinct count(fecha) as cuenta from conexion where idpuntoacceso = '".$pa->id."' order by fecha");
        
        return response()->json([
            'pa' =>  \DB::select("Select * from conexion where idpuntoacceso = '".$pa->id."' order by fecha"),
            'modelo' => $pa->modelo,
            'cuenta' => $cuenta,
            'fechas' => $fechas,
            ]);
    }
    
    
}
