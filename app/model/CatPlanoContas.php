<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CatPlanoContas extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "CodPai",
        "Descricao",
    ];
    protected static $logName = 'Plano Contas';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Categoria {$eventName}";
    }

    protected $table = "cat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "CodPai",
        "Descricao",
    );
}
