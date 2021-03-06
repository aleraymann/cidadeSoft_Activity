@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#Comi_Operad").mask("9.99");
        $("#Tx_Antecip").mask("9.99");
    });

</script>
@if(session('success_message'))
       <div class="alert alert-danger">
        {{session('success_message')}}
      </div>
      @endif
    
      <div class="main-panel">
        <div style="margin-top:60px">
        <!-- Button to Open the Modal -->
        @include('sweetalert::alert')
        <!--end container-->    
      </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formas de Pagamento
                @can('insere_formPag')
                    <button type="button" class="btn btn-success btn-rounded float-right" data-toggle="modal"
                        data-target="#myModal">
                        <i class='fas fa-plus'></i> Formas
                    </button>
                @endcan
                </h4>

                @include("modals.modal_form_pag")
            </div>
            <div class="form-row col-lg-12">
                <div>
                    <a href="{{ url("/Cadastro/form_pag") }}" class="btn btn-sm btn-info mt-3 mr-2">Todos</a>
                </div>
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Código</option>
                        <option value="D">Descrição</option>
                    </select>
                </div>
                <div id="name" hidden>
                    <form action="{{ url('/Forma/busca') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-10 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Descrição">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                
                <div id="cod" hidden>
                    <form action="{{ url('/Forma/busca2') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-8 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Código">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
               
                <div class="form-row col-lg-12">
                @if($criterio != "")
                    <div class="card-body">
                        <h5>Encontrado com: "{{ $criterio }}" </h5>
                    </div>
                @endif
                </div>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Descrição</th>
                                <th class="">Comissão a ser paga</th>
                                <th class="">Taxa para antecipação de crédito</th>
                                <th class="">Forma Pagamento</th>
                                <th class="">Destino do Pagamento</th>
                                <th class="">Cli/For de Destino</th>
                                <th class="">Cod Adm</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($form_pag as $f_pag)
                            @can('view_formPag', $f_pag)
                                <tr>
                                    <td class=""> {{ $f_pag->Codigo }} </td>
                                    <td class=""> {{ $f_pag->Descricao }} </td>
                                    <td class=""> {{ $f_pag->Comi_Operad }} </td>
                                    <td class=""> {{ $f_pag->Tx_Antecip }} </td>
                                    @if( $f_pag->Tipo=="DI")
                                        <td>{{ $f_pag->Tipo = "Dinheiro" }}</td>
                                    @elseif( $f_pag->Tipo =="CH")
                                        <td>{{ $f_pag->Tipo = "Cheque" }}</td>
                                    @elseif( $f_pag->Tipo =="CC")
                                        <td>{{ $f_pag->Tipo = "Cartão de Crédito" }}
                                        </td>
                                    @elseif( $f_pag->Tipo =="CD")
                                        <td>{{ $f_pag->Tipo = "Cartão de Débito" }}
                                        </td>
                                    @elseif( $f_pag->Tipo =="BO")
                                        <td>{{ $f_pag->Tipo = "Boleto" }}</td>
                                    @else
                                        <td>{{ $f_pag->Tipo= "Duplicata Mercantil" }}
                                        </td>
                                    @endif
                                    @if( $f_pag->Destino=="BC")
                                        <td>{{ $f_pag->Destino = "Banco" }}</td>
                                    @elseif( $f_pag->Destino =="CX")
                                        <td>{{ $f_pag->Destino = "Caixa" }}</td>
                                    @else
                                        <td>{{ $f_pag->Destino= "Contas" }}</td>
                                    @endif
                                    <td class=""> {{ $f_pag->Dest_CliFor }} </td>
                                    <td class=""> {{ $f_pag->user_id}} </td>
                                    <td class="">
                                        <div class="btn-group" role="group">
                                        @can('edita_condPag')
                                            <a href='{{ url("/Forma/editar/$f_pag->Codigo") }}'
                                            class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                        @endcan
                                        @can('edita_condPag')
                                                <a href="javascript:deletarRegistro('{{ $f_pag->Codigo }}')"
                                                class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='far fa-trash-alt'></i></a>
                                        @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endcan
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $form_pag->links() }}
    </div>
</div>

@endsection


<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                     // se validar desabilita o botao
                     if (form.checkValidity() === true) {
                        form.cadastrar.disabled = true;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script>
    function deletarRegistro(id) {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        swal({
            title: "Excluir",
            text: "Excluir do item selecionado?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Sim',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Não',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url("Forma/excluir") }}" + '/' + id,
                    type: 'DELETE',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: function () {
                        location.reload();
                        swal({
                            title: "Registro deletado com sucesso!",
                            icon: "success",
                        });

                    },
                    error: function () {
                        swal("Erro!", "Algo de errado aconteceu!", );
                    }
                });

            }
        });
    }

</script>
<script>
        function verificar(value) {
            var cod = document.getElementById("cod");
            var name = document.getElementById("name");
            if (value == "C") {
                cod.hidden = false;
                name.hidden = true;

            } else if (value == "D") {
                cod.hidden = true;
                name.hidden = false;
            }
        };
    </script>