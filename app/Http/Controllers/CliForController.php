<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\model\CliFor;
use App\model\Funcionario;
use App\model\Empresa;
use App\model\CliForContato;
use App\model\CliForEndereco;
use App\model\CliForReferencia;
use App\model\BoletoTitulo;
use App\User;
use Gate;

class CliForController extends Controller
{
    public function listar( CliFor $clifor, Funcionario $vendedor, Empresa $empresa,User $user)
    {  
        //$clifor = $clifor->all();
      
        $clifor = CliFor::paginate(10);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        $criterio = "";
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio")); 
    }
    public function update(Request $request, CliFor $clifor, $id = null, 
                            CliForEndereco $clifor_endereco, 
                            CliForContato $clifor_contato,
                            CliForReferencia $clifor_referencia)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $clifor->find($id);
                $dados->update($request->all());
                return redirect()
                ->action("CliForController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {   
                //Cliente
                $clifor = new CliFor;
                $clifor->user_id = $request->user_id;
                $clifor->Class_ABC = $request->Class_ABC;
                $clifor->Tip = $request->Tip;
                $clifor->Ativo = $request->Ativo;
                $clifor->Data_Cadastro = $request->Data_Cadastro;
                $clifor->Fis_Jur = $request->Fis_Jur;
                $clifor->Razao_Social = $request->Razao_Social;
                $clifor->Nome_Fantasia = $request->Nome_Fantasia;
                $clifor->Data_Nascimento = $request->Data_Nascimento;
                $clifor->Estado_Civil = $request->Estado_Civil;
                $clifor->Sexo = $request->Sexo;
                $clifor->CNPJ = $request->CNPJ;
                $clifor->IE = $request->IE;
                $clifor->IEST = $request->IEST;
                $clifor->IM = $request->IM;
                $clifor->CPF = $request->CPF;
                $clifor->RG = $request->RG;
                $clifor->Telefone = $request->Telefone;
                $clifor->Celular = $request->Celular;
                $clifor->Comercial = $request->Comercial;
                $clifor->Email = $request->Email;
                $clifor->Site = $request->Site;
                $clifor->Cli_Atacado = $request->Cli_Atacado;
                $clifor->Perfil = $request->Perfil;
                $clifor->Profissao = $request->Profissao;
                $clifor->SitFinanc = $request->SitFinanc;
                $clifor->LimiCred = $request->LimiCred;
                $clifor->PercDescAcresc = $request->PercDescAcresc;
                $clifor->Vendedor = $request->Vendedor;
                $clifor->Local_UltMov = $request->Local_UltMov;
                $clifor->Data_UltMov = $request->Data_UltMov;
                $clifor->Observacoes = $request->Observacoes;
                $clifor->Aviso = $request->Aviso;
                $clifor->Empresa = $request->Empresa;
                $clifor->save();

                //Endereço
                $clifor_endereco = new CliForEndereco;
                $clifor_endereco->Cod_CliFor = $clifor->Codigo;
                $clifor_endereco->user_id = $request->user_id;
                $clifor_endereco->CEP = $request->CEP;
                $clifor_endereco->Tipo_Endereco = $request->Tipo_Endereco;
                $clifor_endereco->Endereco = $request->Endereco;
                $clifor_endereco->Numero = $request->Numero;
                $clifor_endereco->Bairro = $request->Bairro;
                $clifor_endereco->Complemento = $request->Complemento;
                $clifor_endereco->Ponto_Referencia = $request->Ponto_Referencia;
                $clifor_endereco->Cod_IBGE = $request->Cod_IBGE;
                $clifor_endereco->Cidade = $request->Cidade;
                $clifor_endereco->Estado = $request->Estado;
                $clifor_endereco->save();

                //Contato
                $clifor_contato = new CliForContato;
                $clifor_contato->Cod_CliFor = $clifor->Codigo;
                $clifor_contato->user_id = $request->user_id;
                $clifor_contato->Tipo = $request->Tipo;
                $clifor_contato->Setor = $request->Setor;
                $clifor_contato->Nome = $request->Nome;
                $clifor_contato->Data_Nasc = $request->Data_Nasc;
                $clifor_contato->RG = $request->RG;
                $clifor_contato->CPF = $request->CPF;
                $clifor_contato->Celular = $request->Celular;
                $clifor_contato->Email = $request->Email;
                $clifor_contato->save();

                //Referencia
                $clifor_referencia = new CliForReferencia;
                $clifor_referencia->Cod_CliFor = $clifor->Codigo;
                $clifor_referencia->user_id = $request->user_id;
                $clifor_referencia->Loja_Banco = $request->Loja_Banco;
                $clifor_referencia->Conta = $request->Conta;
                $clifor_referencia->Telefone = $request->Telefone;
                $clifor_referencia->Ult_Compra = $request->Ult_Compra;
                $clifor_referencia->Valor_UltCompra = $request->Valor_UltCompra;
                $clifor_referencia->Limite = $request->Limite;
                $clifor_referencia->save();

            }
            
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");     
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("CliForController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function destroy($Codigo, Clifor $clifor)
    { 
        $clifor->destroy($Codigo);
    }

    public function edit(CliFor $clifor, $id, Funcionario $vendedor, Empresa $empresa,User $user)
    {
        $clifor = $clifor->find($id);
        if(Gate::denies('view_clifor', $clifor)){
            return redirect()->back();
        }
        if(Gate::denies('edita_cliente')){
            return redirect()->back();
        }
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("edit.edit_clifor", compact("clifor","id","vendedor","empresa","user"));
    }


    public function view(CliFor $clifor, $id, 
                        CliForContato $clifor_contato, 
                        CliForEndereco $clifor_endereco, 
                        CliforReferencia $clifor_referencia)
    {
        
        $clifor = $clifor->find($id);
        if(Gate::denies('view_clifor', $clifor)){
            return redirect()->back();
        }
        $clifor_contato = CliForContato::all();
        $clifor_referencia = CliforReferencia::all();
        $clifor_endereco = CliForEndereco::all();
        return view("visual.view_clifor", compact("clifor","id","clifor_contato","clifor_endereco","clifor_referencia"));
    }

    public function busca( Request $request){

        $criterio  = $request->criterio;
        $clifor = CliFor::where( 'Nome_Fantasia' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio")); 
    }


    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        $vendedor = Funcionario::all();
        $empresa = Empresa::all();
        $user = User::all();
        return view("clifor", compact("clifor","vendedor","empresa","user","criterio"));
    }
 
}
