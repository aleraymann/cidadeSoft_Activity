<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DataContaMovimento extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Num_caixa",
        "Turno",
        "Data",
    ];
    protected static $logName = 'Data de mov de conta';
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
        return "Data de mov de conta {$eventName}";
    }

    protected $table = "data_conta_movimento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Num_caixa",
        "Turno",
        "Data",
    );
}
