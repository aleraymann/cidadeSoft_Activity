<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Fluxo extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Cod_Conta",
        "Data",
        "Saldo",
        "Empresa",
    ];
    protected static $logName = 'Fluxo de conta';
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
        return "Fluxo de conta {$eventName}";
    }

    protected $table = "conta_fluxo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_Conta",
        "Data",
        "Saldo",
        "Empresa",
    );
}
