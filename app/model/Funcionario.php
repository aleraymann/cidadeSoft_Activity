<?php


namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Funcionario extends Model
{
    use LogsActivity;

  protected static $logAttributes = [
    "Nome",
    "CPF",
    "RG",
    "CEP",
    "Endereco",
    "Bairro",
    "Cidade",
    "Estado",
    "Telefone",
    "Celular",
    "Email",
    "Usuario",
    "Senha",
    "ComiVend",
    "ComiServ",
    "LimDescPV",
    "LimDescPP",
    "idmsgs"
  ];
  protected static $logName = 'Funcionário';
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
      return "Funcionário {$eventName}";
  }

    protected $table = "funcionario";
    public $timestamps = false;
    protected $primaryKey = 'Codigo';
    protected $fillable = Array(
        "user_id",
        "Nome",
        "CPF",
        "RG",
        "CEP",
        "Endereco",
        "Bairro",
        "Cidade",
        "Estado",
        "Telefone",
        "Celular",
        "Email",
        "Usuario",
        "Senha",
        "ComiVend",
        "ComiServ",
        "LimDescPV",
        "LimDescPP",
        "idmsgs"
    );
    //funcionario-empresa
    public function cod_empresa()
    {
        return $this->belongsTo(' App\model\Empresa');
    }
    
   
    public function vendedor()
    {
        return $this->hasMany(' App\model\CliFor', 'Cod_funcionario');
    }
    
    
}
