<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Recibo extends Model
{
    use LogsActivity;

  protected static $logAttributes = [
    'Pag_Rec',
        'Rec_De',
        'Pag_Para',
        'Valor',
        'Referente',
        'Data',
        'Ben_Nome',
        'Ben_End',
        'Ben_CPF_CNPJ',
        'Em_Nome',
        'Em_End',
        'Em_CPF_CNPJ',
        'Transacao',
        'Empresa',
  ];
  protected static $logName = 'Recibo';
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
      return "Recibo {$eventName}";
  }

    protected $table = "recibo";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Pag_Rec',
        'Rec_De',
        'Pag_Para',
        'Valor',
        'Referente',
        'Data',
        'Ben_Nome',
        'Ben_End',
        'Ben_CPF_CNPJ',
        'Em_Nome',
        'Em_End',
        'Em_CPF_CNPJ',
        'Transacao',
        'Empresa',
    );
}
