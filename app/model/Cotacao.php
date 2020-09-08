<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Cotacao extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Moeda",
        "Data",
        "Cotacao"
    ];
    protected static $logName = 'Cotação';
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
        return "Cotação {$eventName}";
    }
  
    protected $table = "cotacao";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Moeda",
        "Data",
        "Cotacao"
    );
}
