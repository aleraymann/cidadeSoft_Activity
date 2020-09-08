<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Cond_Pag extends Model
{
  use LogsActivity;

    protected static $logAttributes = [
      "Condicao",
      "Tab_Preco",
      "ParcDias",
      "ParcForma",
      "ParcJuros",
    ];
    protected static $logName = 'Condição de Pag';
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
        return "Condição de Pag {$eventName}";
    }
  
    protected $table = "fin_condpag";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Condicao",
        "Tab_Preco",
        "ParcDias",
        "ParcForma",
        "ParcJuros",
    );
    
//cond_pag em empresa
  public function cond_pag()
  {
    return $this->belongsTo('App\model\Empresa');
  }

    public function form_pag()
    {
        return $this->hasMany(' App\model\Empresa', 'Cod_forma');
    }
}
