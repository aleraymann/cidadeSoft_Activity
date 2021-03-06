<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Telemarketing extends Model
{

    use LogsActivity;

    protected static $logAttributes = [
            'Cod_CliFor',
            'Data',
            'Assunto',
            'Agendou_Visita',
            'Agendou_Servico',
            'Agendou_Atendimento',
            'Cod_Func',
            'Data_Conclusao',
            'Concluso'
        ];
    protected static $logName = 'telemarketing';
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
        return "Telemarketing {$eventName}";
    }

    protected $table = "telemarketing";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_CliFor',
        'Data',
        'Assunto',
        'Agendou_Visita',
        'Agendou_Servico',
        'Agendou_Atendimento',
        'Cod_Func',
        'Data_Conclusao',
        'Concluso',
    );
}
