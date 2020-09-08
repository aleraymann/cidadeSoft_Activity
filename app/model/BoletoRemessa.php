<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BoletoRemessa extends Model
{
  use LogsActivity;

  protected static $logAttributes = [
    "Numero_Rem",
    "Data",
    "Hora",
    "Arquivo",
    "Cod_Conv",
  ];
  protected static $logName = 'Boleto remessa';
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
      return "Boleto remessa {$eventName}";
  }

    protected $table = "boleto_remessa";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
      "user_id",
      "Numero_Rem",
      "Data",
      "Hora",
      "Arquivo",
      "Cod_Conv",
    );
    public function cod_remessa()
    {
      return $this->hasMany(' App\model\BoletoTitulo', 'Cod_remessa');
    }
    //convenio em remessa
    public function cod_ncm()
    {
        return $this->hasOne('App\model\Convenio', 'Codigo', 'Cod_convenio');
    }
}
