<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContasPagar extends Model
{
    use LogsActivity;

  protected static $logAttributes = [
    'Sel',
        'Num_Doc',
        'Parcela',
        'Cod_Clifor',
        'Forma_Pag',
        'Cond_Pag',
        'Data_Entrada',
        'Vencimento',
        'Data_Juros',
        'Valor_Origem',
        'Valor_Divida',
        'Multa',
        'Taxa_Juros',
        'Desconto',
        'Juros',
        'Divida_Estimada',
        'Origem',
        'Local_Pag',
        'Observacoes',
        'Cod_Boleto',
        'Nosso_Numero',
        'Linha_Digitavel',
        'NF',
        'Credito',
        'Transacao',
        'Plano_Ctas',
        'Centro_Custo',
        'Empresa'
  ];
  protected static $logName = 'Contas a Pagar';
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
      return "Contas a Pagar {$eventName}";
  }

    protected $table = "ctas_pagar";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Sel',
        'Num_Doc',
        'Parcela',
        'Cod_Clifor',
        'Forma_Pag',
        'Cond_Pag',
        'Data_Entrada',
        'Vencimento',
        'Data_Juros',
        'Valor_Origem',
        'Valor_Divida',
        'Multa',
        'Taxa_Juros',
        'Desconto',
        'Juros',
        'Divida_Estimada',
        'Origem',
        'Local_Pag',
        'Observacoes',
        'Cod_Boleto',
        'Nosso_Numero',
        'Linha_Digitavel',
        'NF',
        'Credito',
        'Transacao',
        'Plano_Ctas',
        'Centro_Custo',
        'Empresa'
    );
}
