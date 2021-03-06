@extends("template")

@section("conteudo")
<div class="main-panel" style="margin-top:60px">
    <a href="{{ url("/Cadastro/ctas_recebidas")}}" class="btn btn-primary btn-xs ml-3 mb-1">
    <i class="la la-long-arrow-left"></i>
    </a>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                   Conta: {{ $ctas_recebidas->Num_Doc }}
                </h4>
                <div class="btn-group" role="group">
                @can('ctas_recebidas')      
        <a href='{{ url("/Contas_Pagas/editar/$ctas_recebidas->Codigo") }}'
        class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
          @endcan
    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>Dados da Conta</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                <b class="ls-label-text">Número do Documento:</b>
                                    <label>{{ $ctas_recebidas->Num_Doc }} </label><br> 
                                <b class="ls-label-text">Parcela:</b>
                                    <label>{{ $ctas_recebidas->Parcela }} </label><br>
                                <b class="ls-label-text">Cod do Cliente/Fornecedor:</b>
                                    <label>{{ $ctas_recebidas->Cod_Clifor }} </label><br>   
                                <b class="ls-label-text">Cod da Forma de Pagamento:</b>
                                    <label>{{ $ctas_recebidas->Forma_Pag }} </label><br>   
                                <b class="ls-label-text">Cod da Condição de Pagamento:</b>
                                    <label>{{ $ctas_recebidas->Cond_Pag }} </label><br>   
                                <b class="ls-label-text">Data de Pagamento:</b>
                                    <label>{{ $ctas_recebidas->Data_Pagto }} </label><br> 
                                <b class="ls-label-text">Data Baixa:</b>
                                    <label>{{ $ctas_recebidas->Data_Baixa }} </label><br>   
                                <b class="ls-label-text">Tipo de Pagamento:</b>
                                    <label>{{ $ctas_recebidas->Tipo_Pag }} </label><br>   
                                <b class="ls-label-text">Valor que Originou a Conta:</b>
                                    <label>{{ $ctas_recebidas->Valor_Origem }} </label><br>
                                <b class="ls-label-text">Valor efetivamente pago:</b>
                                    <label>{{ $ctas_recebidas->Valor_Pago }} </label><br>
                                <b class="ls-label-text">Valor do saldo da dívida:</b>
                                    <label>{{ $ctas_recebidas->Valor_Divida }} </label><br>
                                </td>
                                <td>
                                <b class="ls-label-text">Multa cobrada na baixa do tírulo:</b>
                                    <label>{{ $ctas_recebidas->Multa }} </label><br>
                                <b class="ls-label-text">Juros cobrados na baixa do tírulo:</b>
                                    <label>{{ $ctas_recebidas->Taxa_Juros }} </label><br>
                                <b class="ls-label-text">Desconto concedido na baixa do tírulo:</b>
                                    <label>{{ $ctas_recebidas->Desconto }} </label><br>
                                <b class="ls-label-text">Local/Nota de origem:</b>
                                    <label>{{ $ctas_recebidas->Origem }} </label><br>
                                <b class="ls-label-text">Local de Pagamento</b>
                                    <label>{{ $ctas_recebidas->Local_Pag=="BCO"?"Banco":"Caixa" }}</label><br>
                                <b class="ls-label-text">Observações:</b>
                                    <label>{{ $ctas_recebidas->Observacoes }} </label><br>
                                <b class="ls-label-text">Recido:</b>
                                    <label>{{ $ctas_recebidas->Recibo }}</label><br>
                                <b class="ls-label-text">Cod do Plano de Contas:</b>
                                    <label>{{ $ctas_recebidas->Plano_Ctas }} </label><br>
                                <b class="ls-label-text">Cod do Centro de Custo:</b>
                                    <label>{{ $ctas_recebidas->Centro_Custo }} </label><br>
                                <b class="ls-label-text">Cod da Empresa:</b>
                                    <label>{{ $ctas_recebidas->Empresa }} </label><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @endsection
