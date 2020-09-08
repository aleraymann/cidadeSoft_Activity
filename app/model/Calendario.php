<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Calendario extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        'cod_usuario',
        'evento',
        'descricao',
        'cor',
        'data_inicio',
        'data_fim'
    ];
    protected static $logName = 'Evento';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Evento {$eventName}";
    }

    protected $table = "events";
    public $timestamps = false;
    protected $fillable = Array(
        "user_id",
        'cod_usuario',
        'evento',
        'descricao',
        'cor',
        'data_inicio',
        'data_fim'
    );
}
