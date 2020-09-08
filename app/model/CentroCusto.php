<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CentroCusto extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
      "Descricao",
    ];
    protected static $logName = 'Centro de Custo';
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
        return "Centro de Custo {$eventName}";
    }
  
    protected $table = "centro_custo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
    );

}
