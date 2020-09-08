<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContaSaldo extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Data',
        'Turno',
        'Cod_Fun',
        'Saldo_Inicial',
        'Total_Ent',
        'Total_Sai',
        'Saldo_Final',
        'Total_Dinheiro',
        'Total_Cheque',
        'Total_Cartao',
        'Total_Duplicata',
        'Situacao',
        'Cod_Conta',
        'Empresa'
    ];
    protected static $logName = 'Saldo de Conta';
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
        return "Saldo de Conta {$eventName}";
    }

    protected $table = "conta_saldo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        'Data',
        'Turno',
        'Cod_Fun',
        'Saldo_Inicial',
        'Total_Ent',
        'Total_Sai',
        'Saldo_Final',
        'Total_Dinheiro',
        'Total_Cheque',
        'Total_Cartao',
        'Total_Duplicata',
        'Situacao',
        'Cod_Conta',
        'Empresa'
    );
    public function cod_conta_saldo()
    {
        return $this->hasOne('App\model\Empresa', 'Codigo', 'Cod_empresa');
    }
}
