<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContasPagas extends Model
{
    use LogsActivity;

  protected static $logAttributes = [
    'Cod_Conta',
    'Num_Doc',
     'Parcela',
     'Cod_Clifor',
     'Forma_Pag',
     'Cond_Pag',
    'Data_Pagto',
     'Data_Baixa',
     'Tipo_Pag',
     'Valor_Origem',
     'Valor_Pago',
     'Valor_Divida',
     'Multa',
     'Desconto',
     'Juros',
     'Origem',
     'Local_Pag',
     'Num_DocCxBco',
     'Observacoes',
     'Recibo',
     'Plano_Ctas',
     'Centro_Custo',
     'Empresa',
  ];
  protected static $logName = 'Contas Pagas';
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
      return "Contas Pagas {$eventName}";
  }

    protected $table = "ctas_pagas";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Cod_Conta',
       'Num_Doc',
        'Parcela',
        'Cod_Clifor',
        'Forma_Pag',
        'Cond_Pag',
       'Data_Pagto',
        'Data_Baixa',
        'Tipo_Pag',
        'Valor_Origem',
        'Valor_Pago',
        'Valor_Divida',
        'Multa',
        'Desconto',
        'Juros',
        'Origem',
        'Local_Pag',
        'Num_DocCxBco',
        'Observacoes',
        'Recibo',
        'Plano_Ctas',
        'Centro_Custo',
        'Empresa',



    );
}
