<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CliForReferencia extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_CliFor",
    "user_id",
    "Loja_Banco",
    "Conta",
    "Telefone",
    "Ult_Compra",
    "Valor_UltCompra",
    "Limite",
  ];
  protected static $logName = 'CliFor Referencia';
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
      return "CliFor Referencia {$eventName}";
  }

  protected $table = "clifor_referencia";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "Loja_Banco",
    "Conta",
    "Telefone",
    "Ult_Compra",
    "Valor_UltCompra",
    "Limite",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }
}