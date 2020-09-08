<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InventarioContagem extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Responsavel",
        'Codigo_Barras',
    ];
    protected static $logName = 'Contagem de Inventario';
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
        return "Contagem de Inventário {$eventName}";
    }
    protected $table = "inventario_contagem";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Responsavel",
        'Codigo_Barras',
        
    );
}
