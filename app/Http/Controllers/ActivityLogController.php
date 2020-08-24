<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{

    public function index( Activity $activity)
    {  
        $activity = $activity->all();
        $activity = Activity::paginate(10);
        $criterio = "";
        return view('logs', compact('activity','criterio'));
    }


    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $activity = Activity::where( 'log_name' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("logs", compact("activity","criterio")); 
    }
    public function busca( Request $request){
        $criterio  = $request->criterio;
        $activity = Activity::where( 'causer_id' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("logs", compact("activity","criterio")); 
    }
}
