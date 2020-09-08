<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Adicional_OSPed extends Model
{
  
  use LogsActivity;

  protected static $logAttributes = [
    "Cod_item",
    "Cod_Ref",
    "Descricao",
    "Valor",
    "Qtd_Alterar",
    "Cod_Item_Dev",
    "Cod_Ref_Dev",
    "Qtd_Dev",
  ];
  protected static $logName = 'Adicional OS';
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
      return "Adicional OS {$eventName}";
  }

    protected $table = "adicional_osped";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
      "user_id",
      "Cod_item",
      "Cod_Ref",
      "Descricao",
      "Valor",
      "Qtd_Alterar",
      "Cod_Item_Dev",
      "Cod_Ref_Dev",
      "Qtd_Dev",
    );
}
