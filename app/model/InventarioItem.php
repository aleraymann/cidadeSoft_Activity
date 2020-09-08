<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InventarioItem extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Cod_Invent',
        'Cod_Ref',
        'Cod_Item',
        'Cod_Barras',
        'Qtd_EstoqueF',
        'Qtd_EstoqueL',
        'Qtd_Contagem',
        'Divergencia',
    ];
    protected static $logName = 'Item de Inventario';
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
        return "Item de Inventário {$eventName}";
    }

    protected $table = "inventario_item";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Invent',
        'Cod_Ref',
        'Cod_Item',
        'Cod_Barras',
        'Qtd_EstoqueF',
        'Qtd_EstoqueL',
        'Qtd_Contagem',
        'Divergencia',
        
    );
}
