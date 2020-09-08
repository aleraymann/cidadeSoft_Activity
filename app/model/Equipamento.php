<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Equipamento extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Cod_CliFor',
        'Nro_Serie',
        'Placa',
        'Equipamento',
        'Marca',
        'Modelo',
        'Nro_Frota',
        'Fabricacao',
        'Combustivel',
        'Acessorios',
        'Estado',
        'Foto'
    ];
    protected static $logName = 'Equipamento';
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
        return "Equipamento {$eventName}";
    }


    protected $table = "equipamento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Nro_Serie',
        'Placa',
        'Equipamento',
        'Marca',
        'Modelo',
        'Nro_Frota',
        'Fabricacao',
        'Combustivel',
        'Acessorios',
        'Estado',
        'Foto',
    );
}
