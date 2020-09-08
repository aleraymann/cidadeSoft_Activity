<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CFOP extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Cod_CliFor",
        'CFOP',
        'Descricao',
        'Aplicacao',
        'Dispositivo',
        'ES',
        'AlimFin',
        'AlimFisc',
        'ObsnaNFe',
    ];
    protected static $logName = 'CFOP';
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
        return "CFOP {$eventName}";
    }

    protected $table = "operacaofiscal";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_CliFor",
        'CFOP',
        'Descricao',
        'Aplicacao',
        'Dispositivo',
        'ES',
        'AlimFin',
        'AlimFisc',
        'ObsnaNFe',
    );
}
