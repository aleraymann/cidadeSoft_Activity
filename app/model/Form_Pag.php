<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Form_Pag extends Model
{
  use LogsActivity;

    protected static $logAttributes = [
      "Descricao",
      "Comi_Operad",
      "Tx_Antecip",
      "Tipo",
      "Destino",
      "Dest_CliFor",
    ];
    protected static $logName = 'Forma de Pag';
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
        return "Forma de Pag {$eventName}";
    }
  
    protected $table = "fin_formapag";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Descricao",
        "Comi_Operad",
        "Tx_Antecip",
        "Tipo",
        "Destino",
        "Dest_CliFor",
    );
    //form_pag em empresa
  public function form_pag()
  {
    return $this->belongsTo('App\model\Empresa');
  }
}
