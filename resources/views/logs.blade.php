@extends("template")

@section("conteudo")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
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
                <h4 class="card-title">Logs</h4>
            </div>
            <div class="form-row col-sm-12">
                <div>
                    <a href="{{ url("/Logs") }}" class="btn btn-sm btn-info mt-3 mr-2">Todos</a>
                </div>
                <div class="form-group col-lg-2">
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Nome do Item</option>
                        <option value="P">Cod do Autor</option>
                        <option value="E">Empresa</option>
                    </select>
                </div>
                <div id="cod" hidden>
                    <form action="{{ url('/Logs/busca2') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-8 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Nome do Item">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div id="emp" hidden>
                    <form action="{{ url('/Logs/busca3') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2">

                            <select  class="form-control input-border-bottom" name="criterio">
                            <option>Selecione</option>
                        @foreach($empresa as $e)
                        @can("view_empresa",$e)
                        <option value="{{$e->Nome_Fantasia}}">{{$e->Nome_Fantasia}}</option>
                        @endcan
                        @endforeach
                    </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div id="pag_rec" hidden>
                    <form action="{{ url('/Logs/busca') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-12 mt-2 mr-2" >
                            <input type="text" class="form-control" name="criterio" placeholder="Código do Autor">
                                <div class="input-group-append ml-2">
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
                                <th class="">Data</th>
                                <th class="">Nome</th>
                                <th class="">Ação</th>
                                <th class="">Cod do item envolvido</th>
                                <th class="">Cod do Autor</th>
                                <th class="">Empresa</th>
                                <th class="">Usuario</th>
                                <th class="">Alterado</th>
                                
                            </tr>
                        </thead>
                        @foreach($activity as $i)
                                <tr>
                                    <td class="">{{ $i->created_at }}  </td>
                                    <td class="">{{ $i->log_name }}  </td>
                                    <td class="">{{ $i->description}}  </td>
                                    <td class="">{{ $i->subject_id }}  </td>
                                    <td class="">{{ $i->causer_id }}  </td>
                                    <td class="">{{ $i->NOMEFANTASIA }}  </td>
                                    <td class="">{{ $i->USUARIO }}  </td>
                                    <td class="">{{ $i->properties }}  </td>
                                    
                                </tr>
                           @endforeach
                         
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
   
@endsection


<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function checkForm(form){
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
                    url: "{{ url("Inventario/excluir") }}" + '/' + id,
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
            var emp = document.getElementById("emp");
            var pag = document.getElementById("pag_rec");
            if (value == "C") {
                cod.hidden = false;
                emp.hidden = true;
                pag.hidden = true;
            }else if (value == "P") {
                cod.hidden = true;
                emp.hidden = true;
                pag.hidden = false;
            }
            else if (value == "E") {
                cod.hidden = true;
                emp.hidden = false;
                pag.hidden = true;
            }
        };
    </script>