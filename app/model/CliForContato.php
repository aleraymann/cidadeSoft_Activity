<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CliForContato extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_CliFor",
    "user_id",
    "Tipo",
    "Setor",
    "Nome",
    "Data_Nasc",
    "RG",
    "CPF",
    "Celular",
    "Email",
  ];
  protected static $logName = 'CliFor Contato';
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
      return "CliFor Contato {$eventName}";
  }

  protected $table = "clifor_contato";
  public $timestamps = false;
  protected $primaryKey = 'Codigo';
  protected $fillable = Array(
    "Cod_CliFor",
    "user_id",
    "Tipo",
    "Setor",
    "Nome",
    "Data_Nasc",
    "RG",
    "CPF",
    "Celular",
    "Email",
  );
  public function clifor()
  {
    return $this->hasOne('App\model\CliFor', 'Codigo', 'Cod_clifor');
  }

}
