<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Funcionários</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(!isset($id))
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/Funcionario/salvar") }}"
                        onsubmit="return checkForm(this);">
                    @else
                        <form method="post" action="{{ url("/Funcionario/salvar/$id") }}"
                            enctype="multipart/form-data">
                @endif
                <div class="form-row">
                    <div class="form-group col-lg-12" hidden>
                        <b class="ls-label-text" for="RG">User_ID:</b>
                        <input type="text" class="form-control input-border-bottom" name="user_id" id="user_id" readonly
                            value="{{ Auth::user()->id }}">
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Funcionario">Funcionário</b>
                        <select class="form-control text-center" id="Funcionario" name="Funcionario" required  onchange="pesquisaAjax()">
                            <option value="">Selecione o Funcionário</option>
                            @foreach($user as $u)
                                @if( $u->adm == Auth::user()->id )
                                    <option value="{{ $u->id }}">
                                        {{ $u->name }}
                                    </option>
                                @endif
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
                <div class="form-group col-lg-1">
                        <b class="ls-label-text" for="Codigo">Código:</b>
                        <input type="text" class="form-control text-center" name="Codigo" id="Codigo" readonly>
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Nome">Nome</b>
                        <input type="text" class="form-control  text-center" name="Nome" id="Nome"
                           required minlength="3" maxlength="45" readonly>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="RG">RG</b>
                        <input type="text" class="form-control  text-center" name="RG" id="RG" minlength="8"
                            maxlength="13">

                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="CPF">CPF</b>
                        <input type="text" class="form-control text-center" name="CPF" id="CPF" minlength="11"
                            maxlength="13" onblur="validarCPF(this)">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="CEP">CEP</b>
                        <input type="text" class="form-control text-center" name="CEP" id="CEP"
                            placeholder="Somente os números">
                    </div>
                    <div class="form-group col-lg-8">
                        <b class="ls-label-text" for="Endereco">Endereço:</b>
                        <input type="text" class="form-control text-center" name="Endereco" id="Endereco"
                            placeholder="Rua, Travessa, Av.">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Bairro">Bairro</b>
                        <input type="text" class="form-control text-center" name="Bairro" id="Bairro"
                            placeholder="Bairro">
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Cidade">Cidade</b>
                        <input type="text" class="form-control text-center" name="Cidade" id="Cidade"
                            placeholder="Cidade">
                    </div>
                    <div class="form-group col-lg-4">
                        <b class="ls-label-text" for="Estado">Estado</b>
                        <input type="text" class="form-control text-center" name="Estado" id="Estado" maxlength="2"
                            minlength="2" placeholder="Sigla">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Telefone">Telefone</b>
                        <input type="text" class="form-control text-center" name="Telefone" id="Telefone"
                            placeholder="00-0000-0000">
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="Celular">Celular</b>
                        <input type="text" class="form-control text-center" name="Celular" id="Celular"
                            placeholder="00-00000-0000">
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Email">Email</b>
                        <input type="email" class="form-control text-center" name="Email" id="Email"
                             readonly>
                    </div>
                </div>

                <hr>
                <div class="form-row ">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Usuario">Usuário</b>
                        <input type="text" class="form-control text-center" name="Usuario" id="Usuario" minlength="4"
                            maxlength="50" required  readonly>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="Senha">Senha</b>
                        <input type="password" class="form-control text-center" name="Senha" id="Senha" minlength="4"
                            maxlength="15" required  readonly>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                </div>

                <hr>
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="ComiVend">Comissão de Venda</b>
                        <input type="text" class="form-control text-center" name="ComiVend" id="ComiVend"
                            onblur="com_vend()" minlength="3" maxlength="4" value="00.00">
                        <div class="invalid-feedback" placeholder="0.00">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="ComiServ">Comissão de Seriços</b>
                        <input type="text" class="form-control text-center" name="ComiServ" id="ComiServ"
                            onblur="com_serv()" minlength="3" maxlength="4" value="00.00">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="LimDescPV">Limite desc à vista</b>
                        <input type="text" class="form-control text-center" name="LimDescPV" id="LimDescPV"
                            minlength="3" maxlength="4" value="00.00" onblur="lim_vista()">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <b class="ls-label-text" for="LimDescPP">Limite desc à Prazo</b>
                        <input type="text" class="form-control text-center" name="LimDescPP" id="LimDescPP"
                            minlength="3" value="00.00" onblur="lim_prazo()">
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <b class="ls-label-text" for="idmsgs">Número de Identificação para abrir chamados</b>
                        <input type="text" class="form-control text-center" name="idmsgs" id="idmsgs" required>
                        <div class="invalid-feedback">
                            Por favor, Campo Obrigatório!
                        </div>
                        <div class="valid-feedback">
                            Tudo certo!
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                    <b class="ls-label-text" for="Empresa">Empresa</b>
                        <select class="form-control text-center" id="Empresa" name="Empresa" required>
                            <option value="">Selecione</option>
                            @foreach($empresa as $u)
                            @can('view_empresa', $u)
                                    <option value="{{ $u->Codigo }}">
                                        {{ $u->Nome_Fantasia }}
                                    </option>
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

                    {{ csrf_field() }}
                    <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                    <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                    </form>
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

            </script>

            <!-- Modal footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        if (strCPF == "11111111111") return false;
        if (strCPF == "22222222222") return false;
        if (strCPF == "33333333333") return false;
        if (strCPF == "44444444444") return false;
        if (strCPF == "55555555555") return false;
        if (strCPF == "66666666666") return false;
        if (strCPF == "77777777777") return false;
        if (strCPF == "88888888888") return false;
        if (strCPF == "99999999999") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }
    alert(TestaCPF(strCPF));

    function validarCNPJ(el) {
        if (!_cnpj(el.value)) {

            alert("CNPJ inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }

    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("CPF inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {
            //trata se for valido
            alert("Valido");
        }
    }

    function lim_prazo() {
        var desc = parseFloat(document.getElementById('LimDescPP').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimDescPP').value = lim;
    }

    function lim_vista() {
        var desc = parseFloat(document.getElementById('LimDescPV').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('LimDescPV').value = lim;
    }

    function com_vend() {
        var desc = parseFloat(document.getElementById('ComiVend').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ComiVend').value = lim;
    }

    function com_serv() {
        var desc = parseFloat(document.getElementById('ComiServ').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('ComiServ').value = lim;
    }

</script>
<script>
    function pesquisaAjax() {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute(
        'content'); // obrigatorio para qualqer pesquisa tanto get ou post 
        var Funcionario = $('#Funcionario').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
        //console.log("numero é "+numBol);// display se ta pegando variavel
        $.ajax({
            url: '{{ url("Funcionario/pesquisa") }}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
            type: 'POST', // post ou get
            data: {
                '_method': 'POST',
                '_token': csrf_token,
                'Funcionario': Funcionario
            }, // primeiro nome é como vai passar pro outro
            // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
            dataType: 'json', // tipo dos dados , em json ou xml array 
            success: function (data) { // se tiver sucesso faz codigo abaixo
                //console.log(data);
                if (data != null) {
                    console.log(data);
                    document.getElementById('Nome').value = data[
                    'name']; //se nao retornar nada , no caso deu erro lá no codigo
                    document.getElementById('Codigo').value = data['id'];
                    document.getElementById('Usuario').value = data['email'];
                    document.getElementById('Email').value = data['email'];
                    document.getElementById('Senha').value = data['password'];
                    return;
                } else {

                    document.getElementById('cod_empresa').value = 'Inexistente';
                    document.getElementById('Nome_Fantasia').value = 'Inexistente';
                    // aqui é se der erro, se der erro muda pra vaziu
                    console.log(data); // só pra debug mesmo dps vc tira

                }
            },
        });
    }

</script>
