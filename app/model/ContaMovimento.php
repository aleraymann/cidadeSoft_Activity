<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContaMovimento extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'data_id',
       'Especie',
       'Documento',
        'Num_Doc',
       'Cod_Clifor',
        'Nome_Clifor',
       'Historico',
       'Valor',
       'Operador',
       'Cod_Conta',
       'Cod_Conta_Saldo',
       'Plano_Ctas',
       'Centro_Custo',
       'Transacao',
       'Empresa',
    ];
    protected static $logName = 'Mov de conta';
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
        return "Mov de conta {$eventName}";
    }

    protected $table = "conta_movimento";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        'user_id',
        'data_id',
       'Especie',
       'Documento',
        'Num_Doc',
       'Cod_Clifor',
        'Nome_Clifor',
       'Historico',
       'Valor',
       'Operador',
       'Cod_Conta',
       'Cod_Conta_Saldo',
       'Plano_Ctas',
       'Centro_Custo',
       'Transacao',
       'Empresa',
    );
}
