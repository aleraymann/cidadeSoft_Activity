<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Inventario extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Responsavel",
        "Data",
        "Descricao",
    ];
    protected static $logName = 'Data de Inventario';
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
        return "Data de Inventário {$eventName}";
    }

    protected $table = "inventario";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Responsavel",
        "Data",
        "Descricao",
    );
}
