<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Transportadora;
use App\model\Transportadora_Destino;
use App\model\Transportadora_Valor;
use App\model\Empresa;
use Gate;
class TransportadoraController extends Controller
{
    public function listar(Transportadora $transportadora, Empresa $empresa)
    {
        //$transportadora = $transportadora->all();
        $transportadora = Transportadora::paginate(10);
        $empresa = Empresa::all();
        $criterio = "";
        return view("transportadoras", compact("transportadora","empresa",'criterio'));
    }
    public function salvar(Request $request, Transportadora $transportadora, $id = null,
                            Transportadora_Destino $transportadora_destino,
                            Transportadora_Valor $transportadora_valor)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {   
             
                $dados = $transportadora->find($id);
                
                $dados->update($request->all());
                return redirect()
                ->action("TransportadoraController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {   
               //Transportadora
               $transportadora = new Transportadora;
               $transportadora->user_id = $request->user_id;
               $transportadora->Fis_Jur = $request->Fis_Jur;
               $transportadora->Razao_Social = $request->Razao_Social;
               $transportadora->Nome_Fantasia = $request->Nome_Fantasia;
               $transportadora->Endereco = $request->Endereco;
               $transportadora->Bairro = $request->Bairro;
               $transportadora->Cidade = $request->Cidade;
               $transportadora->Estado = $request->Estado;
               $transportadora->CEP = $request->CEP;
               $transportadora->Telefone = $request->Telefone;
               $transportadora->Celular = $request->Celular;
               $transportadora->Comercial = $request->Comercial;
               $transportadora->Email = $request->Email;
               $transportadora->RG = $request->RG;
               $transportadora->CPF = $request->CPF;
               $transportadora->IE = $request->IE;
               $transportadora->CNPJ = $request->CNPJ;
               $transportadora->Tipo_Frete = $request->Tipo_Frete;
               $transportadora->FreteM2 = $request->FreteM2;
               $transportadora->FreteM3 = $request->FreteM3;
               $transportadora->FretePor = $request->FretePor;
               $transportadora->FreteM = $request->FreteM;
               $transportadora->Empresa = $request->Empresa;
               $transportadora->save();

               //Endereço
               if ($request->Destino_Cidade != null) {
                   $transportadora_destino = new Transportadora_Destino;
                   $transportadora_destino->Cod_Transp = $transportadora->Codigo;
                   $transportadora_destino->user_id = $request->user_id;
                   $transportadora_destino->Destino_Cidade = $request->Destino_Cidade;
                   $transportadora_destino->Destino_UF = $request->Destino_UF;
                   $transportadora_destino->Indice = $request->Indice;
                   $transportadora_destino->save();
               }
               
               }

               //Valor
               if($request->KmIni != null ){
                $transportadora_valor = new Transportadora_Valor;
                $transportadora_valor->Cod_Transp = $transportadora->Codigo;
                $transportadora_valor->user_id = $request->user_id;
                $transportadora_valor->KmIni = $request->KmIni;
                $transportadora_valor->KmFim = $request->KmFim;
                $transportadora_valor->Indice_v = $request->Indice_v;
               $transportadora_valor->save();
            

            }
            
            return redirect()
            ->action("TransportadoraController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");     
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("TransportadoraController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function excluir($Codigo, Transportadora $transportadora)
    {
        $transportadora->destroy($Codigo);
    }


    public function editar(Transportadora $transportadora, $id, Empresa $empresa)
    {
        
        $transportadora = $transportadora->find($id);
       
        if(Gate::denies('view_transp', $transportadora)){
            return redirect()->back();
        }
        if(Gate::denies('edita_transp', $transportadora)){
            return redirect()->back();
        }
        $empresa = Empresa::all();
        return view("edit.edit_transportadora", compact("transportadora","id","empresa"));
    }
    
    public function vizualizar(Transportadora $transportadora, $id,Transportadora_Destino $transportadora_destino,
        Transportadora_Valor $transportadora_valor)
    {
        $transportadora = $transportadora->find($id);
        if(Gate::denies('view_transp', $transportadora)){
            return redirect()->back();
        }
        $transportadora_destino = Transportadora_Destino::all();
        $transportadora_valor = Transportadora_Valor::all();
        return view("visual.view_transportadora", compact("transportadora","id","transportadora_destino","transportadora_valor"));
    }

    public function busca( Request $request){

        //var_dump($request->criterio);.
        $criterio  = $request->criterio;
        $transportadora = Transportadora::where( 'Nome_Fantasia' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("transportadoras", compact("transportadora","empresa",'criterio'));

    }


    public function busca2( Request $request){

        //var_dump($request->criterio1);
        $criterio  = $request->criterio;
        $transportadora = Transportadora::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        //dd($funcionario);
        $empresa = Empresa::all();
        return view("transportadoras", compact("transportadora","empresa",'criterio'));

    }

}
