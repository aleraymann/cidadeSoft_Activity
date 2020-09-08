<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AjusteEstoque extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'Data',
        'Tipo_Mov',
        'Justificativa',
        'Situacao',
        'Cod_Fun',
        'Cod_CliFor',
        'Empresa',
    ];
    protected static $logName = 'Ajuste do Estoque';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Ajuste de Estoque {$eventName}";
    }

    protected $table = "ajuste";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        'Data',
        'Tipo_Mov',
        'Justificativa',
        'Situacao',
        'Cod_Fun',
        'Cod_CliFor',
        'Empresa',
    );
}
