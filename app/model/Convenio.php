<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Convenio extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "Convenio",
        "Comissao"
    ];
    protected static $logName = 'Convenio';
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
        return "Convenio {$eventName}";
    }
  
    protected $table = "convenio";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Convenio",
        "Comissao"
    );

    //convenio em remessa
    public function cod_convenio()
    {
        return $this->hasMany(' App\model\BoletoRemessa', 'Cod_convenio');
    }
}
