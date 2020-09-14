@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Parcela").mask("99/99");
        $("#Valor_Origem").mask("99999999.99");
        $("#Valor_Divida").mask("99999999.99");
        $("#Multa").mask("99999999.99");
        $("#Taxa_Juros").mask("9.99");
        $("#Desconto").mask("99999999.99");
        $("#Juros").mask("99999999.99");
        $("#Divida_Estimada").mask("99999999.99");
        $("#Transacao").mask("99999999999");
    });

</script>

<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ctas_receber") }}"  class="btn btn-primary ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Edição de Contas a Receber
                </h4>
            </div>
            <div class="card-body">
                <!-- Modal body -->
                <div class="modal-body">
                    @if(!isset($id))
                        <form method="post" class="needs-validation" novalidate
                            action="{{ url("/Contas_Receber/salvar") }}">
                        @else
                            <form method="post" action="{{ url("/Contas_Receber/salvar/$id") }}"
                                enctype="multipart/form-data">
                    @endif
                    <div class=" form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Sel">Título Baixado</b>
                            <select class="form-control text-center" name="Sel" id="Sel" required>
                            <option value="{{ isset($ctas_receber->Sel) ? $ctas_receber->Sel : '' }} ">
                            {{ $ctas_receber->Sel == '0'? 'Não': 'Sim' }}
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Num_Doc">Número do Documento</b>
                            <input type="text" class="form-control text-center" name="Num_Doc" id="Num_Doc"
                                maxlength="15" minlength="1" required  value="{{ isset($ctas_receber->Num_Doc) ? $ctas_receber->Num_Doc : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <b class="ls-label-text" for="Parcela">Parcela</b>
                            <input type="text" class="form-control text-center" name="Parcela" id="Parcela"
                                maxlength="5" minlength="5" required value="{{ isset($ctas_receber->Parcela) ? $ctas_receber->Parcela : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cod_Clifor">Cliente/Fornecedor</b>
                            <select class="form-control text-center" name="Cod_Clifor" id="Cod_Clifor" required>
                                <option value="">Selecione</option>
                                @foreach($clifor as $clifor)
                                    @can('view_clifor', $clifor)
                                    <option value="{{ $clifor->Codigo }}" {{ $ctas_receber->Cod_Clifor == $clifor->Codigo ? "selected" : "" }}>
                                    {{ $clifor->Nome_Fantasia }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Forma_Pag">Forma de Pagamento</b>
                            <select class="form-control text-center" name="Forma_Pag" id="Forma_Pag" required>
                                <option value="">Selecione</option>
                                @foreach($f_pag as $f)
                                    @can('view_formPag', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_receber->Forma_Pag == $f->Codigo ? "selected" : "" }}>
                                    {{  $f->Descricao }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Cond_Pag">Cond. de Pagamento</b>
                            <select class="form-control text-center" name="Cond_Pag" id="Cond_Pag" required>
                                <option value="">Selecione</option>
                                @foreach($c_pag as $f)
                                    @can('view_condPag', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_receber->Cond_Pag == $f->Codigo ? "selected" : "" }}>
                                    {{  $f->Condicao }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data_Entrada">Data de Entrada</b>
                            <input type="date" class="form-control text-center" name="Data_Entrada"
                                id="Data_Entrada" required minlength="" maxlength="10"
                                value="{{ $ctas_receber->Data_Entrada }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Vencimento">Vencimento</b>
                            <input type="date" class="form-control text-center" name="Vencimento"
                                id="Vencimento" required minlength="" maxlength="10"  value="{{ $ctas_receber->Vencimento }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Data_Juros">Data para cobrar Juros</b>
                            <input type="date" class="form-control text-center" name="Data_Juros"
                                id="Data_Juros" required minlength="" maxlength="10" value="{{ $ctas_receber->Data_Juros }}">
                            <div class="invalid-feedback">
                                Campo Obrigatório, Mínimo 4 caracteres!!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Origem">Valor de Origem</b>
                            <input type="text" class="form-control text-center" name="Valor_Origem" id="Valor_Origem" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_receber->Valor_Origem) ? $ctas_receber->Valor_Origem : '' }} " required onblur="valor_Origem()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Valor_Divida">Valor da Dívida</b>
                            <input type="text" class="form-control text-center" name="Valor_Divida" id="Valor_Divida" minlength="3" 
                            maxlength="10"  value="{{ isset($ctas_receber->Valor_Divida) ? $ctas_receber->Valor_Divida : '' }} " required onblur="valor_Divida()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Multa">(%) de Multa</b>
                            <input type="text" class="form-control text-center" name="Multa" id="Multa" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_receber->Multa) ? $ctas_receber->Multa : '' }} " required onblur="multa()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Taxa_Juros">Taxa de Juros</b>
                            <input type="text" class="form-control text-center" name="Taxa_Juros" id="Taxa_Juros" minlength="3" 
                            maxlength="3" value="{{ isset($ctas_receber->Taxa_Juros) ? $ctas_receber->Taxa_Juros : '' }} " required onblur="taxa_Juros()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Desconto">Desconto</b>
                            <input type="text" class="form-control text-center" name="Desconto" id="Desconto" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_receber->Desconto) ? $ctas_receber->Desconto : '' }} " required onblur="desconto()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Juros">Juros</b>
                            <input type="text" class="form-control text-center" name="Juros" id="Juros" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_receber->Juros) ? $ctas_receber->Juros : '' }} " required onblur="juros()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                            <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Divida_Estimada">Estimativa da Dívida</b>
                            <input type="text" class="form-control text-center" name="Divida_Estimada" id="Divida_Estimada" minlength="3" 
                            maxlength="10" value="{{ isset($ctas_receber->Divida_Estimada) ? $ctas_receber->Divida_Estimada : '' }} " required onblur="divida_Estimada()">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Origem">Local/Nota de Origem</b>
                            <input type="text" class="form-control text-center" name="Origem" id="Origem"
                                maxlength="15" minlength="3" value="{{ isset($ctas_receber->Origem) ? $ctas_receber->Origem : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Local_Pag">Local de Pagamento</b>
                            <select class="form-control text-center" name="Local_Pag" id="Local_Pag" >
                            <option value="{{ isset($ctas_receber->Local_Pag) ? $ctas_receber->Local_Pag : '' }} ">
                            {{ $ctas_receber->Local_Pag == 'BCO'? 'Banco': 'Caixa' }}
                                <option value="BCO">Banco</option>
                                <option value="CX">Caixa</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <b class="ls-label-text" for="Observacoes">Observações Gerais</b>
                            <input type="text" class="form-control text-center" name="Observacoes" id="Observacoes"
                                maxlength="80" minlength="3" value="{{ isset($ctas_receber->Observacoes) ? $ctas_receber->Observacoes : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-3">
                            <b class="ls-label-text" for="Nosso_Numero">Boleto no Sistema</b>
                            <select class="form-control text-center" name="Nosso_Numero" id="Nosso_Numero"
                            onchange="pesquisarNum()">
                                <option value="">Selecione</option>
                                @foreach($boleto as $b)
                                    @can('view_boletoTit', $b)
                                    <option value="{{ $b->Nosso_Num }}" {{ $ctas_receber->Nosso_Numero == $b->Nosso_Num ? "selected" : "" }}>
                                    {{ $b->Nosso_Num }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1">
                            <b class="ls-label-text" for="Cod_Boleto">Cod</b>
                            <input type="text" class="form-control text-center" name="Cod_Boleto" id="Cod_Boleto"
                                maxlength="5" minlength="5" readonly  value="{{ isset($ctas_receber->Cod_Boleto) ? $ctas_receber->Cod_Boleto : '' }} ">
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-8">
                            <b class="ls-label-text" for="Linha_Digitavel">Linha Digitável</b>
                            <input type="text" class="form-control text-center" name="Linha_Digitavel" id="Linha_Digitavel"
                                maxlength="80" minlength="5"  value="{{ isset($ctas_receber->Linha_Digitavel) ? $ctas_receber->Linha_Digitavel : '' }} " >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="NF">Nota Fiscal:</b>
                            <select class="form-control text-center" name="NF" id="NF" required>
                                <option value="0">Selecione</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Credito">Crédito Cliente/Fornecedor?</b>
                            <select class="form-control text-center" name="Credito" id="Credito" required>
                            <option value="{{ isset($ctas_receber->Credito) ? $ctas_receber->Credito : '' }} ">
                            {{ $ctas_receber->Sel == '0'? 'Não': 'Sim' }}
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Transacao">Transação Financeira</b>
                            <input type="text" class="form-control text-center" name="Transacao" id="Transacao"
                                maxlength="11" minlength="3" required value="{{ isset($ctas_receber->Transacao) ? $ctas_receber->Transacao : '' }} " >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Plano_Ctas">Plano de Contas</b>
                            <select class="form-control text-center" name="Plano_Ctas" id="Plano_Ctas" required>
                            @foreach($planocontas as $c)
                                    @can('view_planocontas', $c)
                                    <option value="{{ $c->Codigo }}" {{ $ctas_receber->Plano_Ctas == $c->Codigo ? "selected" : "" }}>
                                    {{ $c->Conta }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Centro_Custo">Centro de Custo</b>
                            <select class="form-control text-center" name="Centro_Custo" id="Centro_Custo" required>
                                <option value="">Selecione</option>
                                @foreach($c_cust as $f)
                                    @can('view_centroCusto', $f)
                                    <option value="{{ $f->Codigo }}" {{ $ctas_receber->Centro_Custo == $f->Codigo ? "selected" : "" }}>
                                    {{ $f->Descricao }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <b class="ls-label-text" for="Empresa">Empresa</b>
                            <select class="form-control text-center" name="Empresa" id="Empresa" required>
                                <option value="">Selecione</option>
                                @foreach($empresa as $e)
                                    @can('view_empresa', $e)
                                    <option value="{{ $e->Codigo }}" {{ $ctas_receber->Empresa == $e->Codigo ? "selected" : "" }}>
                                    {{ $e->Nome_Fantasia }}</option>
                                    @endcan
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $('input').on("keypress", function (e) {
                            /* ENTER PRESSED*/
                            if (e.keyCode == 13) {
                                /* FOCUS ELEMENT */
                                var inputs = $(this).parents("form").eq(0).find(":input");
                                var idx = inputs.index(this);

                                if (idx == inputs.length - 1) {
                                    inputs[0].select()
                                } else {
                                    inputs[idx + 1].focus(); //  handles submit buttons

                                }
                                return false;
                            }
                        });
                        function valor_Origem() {
                                var desc = parseFloat(document.getElementById('Valor_Origem').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Origem').value = lim;
                            }
                            function valor_Divida() {
                                var desc = parseFloat(document.getElementById('Valor_Divida').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Valor_Divida').value = lim;
                            }
                            function multa() {
                                var desc = parseFloat(document.getElementById('Multa').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Multa').value = lim;
                            }
                            function taxa_Juros() {
                                var desc = parseFloat(document.getElementById('Taxa_Juros').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Taxa_Juros').value = lim;
                            }
                            function desconto() {
                                var desc = parseFloat(document.getElementById('Desconto').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Desconto').value = lim;
                            }
                            function juros() {
                                var desc = parseFloat(document.getElementById('Juros').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Juros').value = lim;
                            }
                            function divida_Estimada() {
                                var desc = parseFloat(document.getElementById('Divida_Estimada').value, 2);
                                lim = desc.toFixed(2);
                                document.getElementById('Divida_Estimada').value = lim;
                            }

                    </script>
                    <div class="form-row">

                        {{ csrf_field() }}
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ url("/Cadastro/ctas_receber") }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
    function pesquisarNum(){
            var csrf_token= document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // obrigatorio para qualqer pesquisa tanto get ou post 
            var numBol = $('#Nosso_Numero').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
            //console.log("numero é "+numBol);// display se ta pegando variavel
            $.ajax({
                    url: '{{url("Contas_Pagar/pesquisa")}}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
                    type: 'POST', // post ou get
                    data: {'_method' : 'POST', '_token' :csrf_token, 'numBoleto': numBol }, // primeiro nome é como vai passar pro outro
                    // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
                    dataType: 'json', // tipo dos dados , em json ou xml array 
                    success: function (data){ // se tiver sucesso faz codigo abaixo
                    //console.log(data);
                        if(!data){
                            document.getElementById('Cod_Boleto').value =''; //se nao retornar nada , no caso deu erro lá no codigo
                            return;
                        }else{
                           

                            document.getElementById('Cod_Boleto').value = data;
                            //console.log(data); // só pra debug mesmo dps vc tira

                        }
                    },
            });
}
</script>