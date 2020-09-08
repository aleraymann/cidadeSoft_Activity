<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class NCM extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "NCM",
        "Descricao",
        "AliqIBPT",
        "AliqImp",
        "AliqEst",
        "AliqMun",
        "Ex",
        "Tipo",
        "VigenciaIni",
        "VigenciaFim",
        "Versao",
        "Chave",
    ];
    protected static $logName = 'NCM';
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
        return "NCM {$eventName}";
    }

    protected $table = "ncm";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "NCM",
        "Descricao",
        "AliqIBPT",
        "AliqImp",
        "AliqEst",
        "AliqMun",
        "Ex",
        "Tipo",
        "VigenciaIni",
        "VigenciaFim",
        "Versao",
        "Chave",
    );
    public function cod_ncm()
    {
        return $this->hasMany(' App\model\CEST', 'Cod_ncm');
    }
}
