<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Fidelidade extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Cod_CliFor",
        "Venda",
        "Valor",
        "Pontos",
        "Pedidos",
        "Data",
        "Usado",
        ];
    protected static $logName = 'fidelidade';
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
        return "Fidelidade {$eventName}";
    }

    protected $table = "fidelidade";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Cod_CliFor",
        "Venda",
        "Valor",
        "Pontos",
        "Pedidos",
        "Data",
        "Usado",
    );
}
