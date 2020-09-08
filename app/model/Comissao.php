<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comissao extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'OS_Ped',
        'Cod_Venda',
        'Cod_Fun',
        'Valor',
        'Cod_Item',
        'Transacao',
        'Comissao',
        'Data_Prev',
        'Situacao',
        'Status',
        'Cod_Conta'
        ];
    protected static $logName = 'comissao';
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
        return "Comissão {$eventName}";
    }

    protected $table = "funcionario_comissao";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'OS_Ped',
        'Cod_Venda',
        'Cod_Fun',
        'Valor',
        'Cod_Item',
        'Transacao',
        'Comissao',
        'Data_Prev',
        'Situacao',
        'Status',
        'Cod_Conta',
    );
    
}
