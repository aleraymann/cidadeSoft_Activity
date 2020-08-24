<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PlanoContas extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "CodPai",
        "Descricao",
        "CD",
        "Conta",
        "Tipo_Custo",
    ];
    protected static $logName = 'Plano Contas';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Plano Contas {$eventName}";
    }

    protected $table = "planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CodPai",
        "Descricao",
        "CD",
        "Conta",
        "Tipo_Custo",
    );
}
