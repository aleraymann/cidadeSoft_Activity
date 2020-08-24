<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SubcatPlanoContas extends Model
{
    use LogsActivity;

    protected static $logAttributes = [
        "cat_id",
        "Descricao",
    ];
    protected static $logName = 'Plano Contas';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Sub-Categoria {$eventName}";
    }

    protected $table = "subcat_planoconta";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "cat_id",
        "Descricao",
    );
}
