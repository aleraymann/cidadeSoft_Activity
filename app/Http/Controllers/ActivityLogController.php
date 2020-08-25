<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\model\Empresa;

class ActivityLogController extends Controller
{
    public function index( Activity $activity)
    {  
        $user = User::all();
        if( auth()->user()->hasAnyRoles('s_adm')){
            $activity = $activity->all();
            $activity = Activity::paginate(10);
            $empresa = Empresa::all();
            $criterio = "";
        }else{
            //$activity = $activity->all();
            $id_adm = auth()->user()->id;
            $empresa = Empresa::all();
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
        LEFT JOIN  users ON users.id = activity_log.causer_id 
        LEFT JOIN empresa on empresa.user_id = users.id
        WHERE empresa.user_id = $id_adm 
        OR users.adm = $id_adm");
            //$activity = Activity::paginate(10);
            //dd($activity);
            $criterio = "";
        }
        return view('logs', compact('activity','criterio',"empresa"));
    }


    public function busca2( Request $request){
        $criterio  = $request->criterio;
        if($criterio){
            $temCriterio = " and  log_name LIKE '%$request->criterio%'";
        }
        $id_adm = auth()->user()->id;
        
        if( auth()->user()->hasAnyRoles('s_adm')){
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
            LEFT JOIN  users ON users.id = activity_log.causer_id 
            LEFT JOIN empresa on empresa.user_id = users.id
            WHERE activity_log.id > 0  $temCriterio");

        }else{
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
        LEFT JOIN  users ON users.id = activity_log.causer_id 
        LEFT JOIN empresa on empresa.user_id = users.id
        WHERE activity_log.id > 0  $temCriterio AND
        empresa.user_id = $id_adm 
        OR users.adm = $id_adm");
        }
        $empresa = Empresa::all();
        return view("logs", compact("activity","criterio", "empresa")); 
    }


    public function busca( Request $request){
        $criterio  = $request->criterio;
        if($criterio){
            $temCriterio = " and  causer_id LIKE '%$request->criterio%'";
        }

        if( auth()->user()->hasAnyRoles('s_adm')){
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
            LEFT JOIN  users ON users.id = activity_log.causer_id 
            LEFT JOIN empresa on empresa.user_id = users.id
            WHERE activity_log.id > 0  $temCriterio");

        }else{
            $id_adm = auth()->user()->id;
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
        LEFT JOIN  users ON users.id = activity_log.causer_id 
        LEFT JOIN empresa on empresa.user_id = users.id
        WHERE activity_log.id > 0  $temCriterio AND
        empresa.user_id = $id_adm 
        OR users.adm = $id_adm");
        }
        $empresa = Empresa::all();
        return view("logs", compact("activity","criterio","empresa")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        if($criterio){
            $temCriterio = " and  empresa.Nome_Fantasia LIKE '%$request->criterio%'";
        }
        $id_adm = auth()->user()->id;

        if( auth()->user()->hasAnyRoles('s_adm')){
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
            LEFT JOIN  users ON users.id = activity_log.causer_id 
            LEFT JOIN empresa on empresa.user_id = users.id
            WHERE activity_log.id > 0  $temCriterio");

        }else{
            $activity = DB::select("SELECT activity_log.*, users.name USUARIO, empresa.Nome_Fantasia NOMEFANTASIA FROM `activity_log` 
            LEFT JOIN  users ON users.id = activity_log.causer_id 
            LEFT JOIN empresa on empresa.user_id = users.id
            WHERE activity_log.id > 0  $temCriterio AND
            empresa.user_id = $id_adm 
            OR users.adm = $id_adm");
        }
        $empresa = Empresa::all();
        return view("logs", compact("activity","criterio","empresa")); 
    }
}
