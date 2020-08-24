<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CEST extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "CEST",
        "NCM",
        "Descricao"
    ];
    protected static $logName = 'cest';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Cest {$eventName}";
    }


    protected $table = "cest";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CEST",
        "NCM",
        "Descricao",
    );
    public function cod_ncm()
    {
        return $this->hasOne('App\model\NCM', 'Codigo', 'Cod_ncm');
    }
}
