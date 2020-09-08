<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ReciboTitulo extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Cod_Rec',
        'Cod_Tit',
    ];
    protected static $logName = 'Recibo de titulo';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {   
        if($eventName == "created"){
            $eventName = "criado";
        }else if($eventName == "updated"){
            $eventName = "editado";
        }else if($eventName == "deleted"){
            $eventName = "excluido";
        }
        return "Recibo de titulo {$eventName}";
    }
  
    
    protected $table = "recibo_tit";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Rec',
        'Cod_Tit',
    );
}
