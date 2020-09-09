<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Transportadora_Destino extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_Transp",
    "user_id",
    "Destino_Cidade",
    "Destino_UF",
    "Indice",
  ];
  protected static $logName = 'Transp Destino';
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
      return "Transp Destino {$eventName}";
  }

  protected $table = "transportadora_destino";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_Transp",
    "user_id",
    "Destino_Cidade",
    "Destino_UF",
    "Indice",
  );

  
  public function transportadora()
  {
    return $this->hasOne('App\model\Transportadora', 'Codigo', 'Cod_Transp');
  }

}
