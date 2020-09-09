<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Duplicata extends Model
{
    use LogsActivity;

  protected static $logAttributes = [
    'Cod_NF',
        'Fatura',
        'Valor',
        'Vencimento',
        'Cod_CliFor',
        'Cod_Boleto',
        'Transacao',
        'Empresa',
  ];
  protected static $logName = 'Duplicata';
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
      return "Duplicata {$eventName}";
  }

    protected $table = "duplicata";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_NF',
        'Fatura',
        'Valor',
        'Vencimento',
        'Cod_CliFor',
        'Cod_Boleto',
        'Transacao',
        'Empresa',
    );
}
