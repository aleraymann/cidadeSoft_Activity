<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Funcionario;
use App\model\Empresa;
use App\User;
use Gate;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function listar( Funcionario $funcionario)
    {  
       // $this->authorize('insere_func', $funcionario);
        if(Gate::denies('insere_func')){
            return redirect()->back();
        }
        $funcionarios = $funcionario->all();
        $funcionario = Funcionario::paginate(10);
        $user = User::all();
        $empresa = Empresa::all();
        $criterio = "";
        return view("funcionarios", compact("funcionario",'criterio','user','empresa')); 
    }

    public function pesquisaAjax(Request $request){
        $Funcionario = $request['Funcionario'];
        $dados = DB::select("SELECT  id,name, password,email FROM `users` WHERE id = '$Funcionario' ");
        if($dados){
            // se existir dados no banco ele gera o array de informações 
            foreach($dados as $dados){
                $dados1['name'] = $dados->name;
                $dados1['id'] = $dados->id; 
                $dados1['email'] = $dados->email; 
                $dados1['senha'] = $dados->password; 
            }
        }else{
            // se retornou vazio, ele manda null pro ajax
            $dados1 = null;
        }
        return json_encode($dados1);
    }

    public function update(Request $request, Funcionario $funcionario, $id = null)
    {
       //dd($request);
        try
        {
            if($id > 0)
            {
                $dados = $funcionario->find($id);
                $dados->update($request->all());
                return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                //Funcionário
                $funcionario = new Funcionario;
                $funcionario->Codigo = $request->Codigo;
                $funcionario->user_id = $request->user_id;
                $funcionario->Nome = $request->Nome;
                $funcionario->CPF = $request->CPF;
                $funcionario->RG = $request->RG;
                $funcionario->CEP = $request->CEP;
                $funcionario->Endereco = $request->Endereco;
                $funcionario->Bairro = $request->Bairro;
                $funcionario->Cidade = $request->Cidade;
                $funcionario->Estado = $request->Estado;
                $funcionario->Telefone = $request->Telefone;
                $funcionario->Celular = $request->Celular;
                $funcionario->Email = $request->Email;
                $funcionario->Usuario = $request->Usuario;
                $funcionario->Senha = $request->Senha;
                $funcionario->ComiVend = $request->ComiVend;
                $funcionario->ComiServ = $request->ComiServ;
                $funcionario->LimDescPV = $request->LimDescPV;
                $funcionario->LimDescPP = $request->LimDescPP;
                $funcionario->idmsgs = $request->idmsgs;
                $funcionario->Empresa = $request->Empresa;
                $funcionario->save();
            }
            
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("FuncionarioController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function edit(Funcionario $funcionario, $id)
    {
        $funcionario = Funcionario::find($id);
        $empresa = Empresa::all();
        //$empresa = $empresa->find($id);
        //$this->authorize('update_funcionario', $funcionario);
        if(Gate::denies('update_funcionario',$funcionario)){
            return redirect()->back();
        }
        return view("edit.edit_funcionarios", compact("funcionario","id",'empresa'));
    }

    public function destroy($Codigo, Funcionario $funcionario)
    {
        $funcionario->destroy($Codigo);
    }

    public function view(Funcionario $funcionario, $id)
    {
        $funcionario = $funcionario->find($id);
        if(Gate::denies('update_funcionario',$funcionario)){
            return redirect()->back();
        }
        return view("visual.view_funcionarios", compact("funcionario","id"));
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $funcionario = Funcionario::where('Nome', 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("funcionarios", compact("funcionario",'criterio','empresa')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }

    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $funcionario = Funcionario::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("funcionarios", compact("funcionario",'criterio','empresa')); 
        //return view("funcionarios", [ 'funcionario' => $funcionario, 'criterio' => $request->criterio ]); 

    }

}
