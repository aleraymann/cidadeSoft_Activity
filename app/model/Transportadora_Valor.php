<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Transportadora_Valor extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_Transp",
    "user_id",
    "KmIni",
    "KmFim",
    "Indice_v"
  ];
  protected static $logName = 'Transp Valor';
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
      return "Transp Valor {$eventName}";
  }

  protected $table = "transportadora_valor";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_Transp",
    "user_id",
    "KmIni",
    "KmFim",
    "Indice_v"
  );

  
  public function transportadora()
  {
    return $this->hasOne('App\model\Transportadora', 'Codigo', 'Cod_Transp');
  }

}
