<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CliForEndereco extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_CliFor",
    "user_id",
    "CEP",
    "Tipo_Endereco",
    "Endereco",
    "Numero",
    "Bairro",
    "Complemento",
    "Ponto_Referencia",
    "Cod_IBGE",
    "Cidade",
    "Estado",
  ];
  protected static $logName = 'CliFor Endereço';
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
      return "CliFor Endereço {$eventName}";
  }

  protected $table = "clifor_endereco";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "CEP",
    "Tipo_Endereco",
    "Endereco",
    "Numero",
    "Bairro",
    "Complemento",
    "Ponto_Referencia",
    "Cod_IBGE",
    "Cidade",
    "Estado",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }

}
