<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Contrato extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Cod_CliFor',
        'Dia_Venc',
        'Parceria',
        'Parceiro',
        'Perc_Comissao',
        'Data',
        'Tipo_Cob',
        'Convenio',
        'Valor',
        'Observacoes',
    ];
    protected static $logName = 'Contrato';
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
        return "Contrato {$eventName}";
    }

    protected $table = "contrato";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Dia_Venc',
        'Parceria',
        'Parceiro',
        'Perc_Comissao',
        'Data',
        'Tipo_Cob',
        'Convenio',
        'Valor',
        'Observacoes',
    );
}
