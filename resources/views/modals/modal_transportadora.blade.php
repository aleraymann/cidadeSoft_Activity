<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Transportadoras
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="needs-validation" novalidate
                    action="{{ url("/Transportadora/salvar") }}"
                    onsubmit="return checkForm(this);">
                    <ul class="nav nav-tabs ml-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dados" role="tab" data-toggle="tab"><b>Dados da
                                    Transportadora</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#destino" role="tab" data-toggle="tab"><b>Destino</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#valor" role="tab" data-toggle="tab"> <b>Valor</b></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane active" id="dados">
                            <div class="container">
                                <div class="form-row">
                                    <div class="form-group col-lg-12" hidden>
                                        <b class="ls-label-text" for="user_id">User_ID</b>
                                        <input type="text" class="form-control text-center" name="user_id" id="user_id"
                                            readonly value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-2">
                                        <b class="ls-label-text" for="Fis_Jur">Tipo</b>
                                        <select onchange="verifica(this.value)" class="form-control " id="Fis_Jur"
                                            name="Fis_Jur" required>
                                            <option value="J">Jurídica</option>
                                            <option value="F">Física</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <b class="ls-label-text" for="Razao_Social">Razão Social</b>
                                        <input type="text" class="form-control text-center" name="Razao_Social"
                                            id="Razao_Social" placeholder="Razão Social" required minlength="4"
                                            maxlength="60">
                                        <div class="invalid-feedback">
                                            Campo Obrigatório, Mínimo 4 caracteres!!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <b class="ls-label-text" for="Nome_Fantasia">Nome Fantasia</b>
                                        <input type="text" class="form-control text-center" name="Nome_Fantasia"
                                            id="Nome_Fantasia" placeholder="Nome Fantasia ou Apelido" required
                                            minlength="4" maxlength="60">
                                        <div class="invalid-feedback">
                                            Campo Obrigatório, Mínimo 4 caracteres!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-lg-2">
                                        <b class="ls-label-text" for="CEP">CEP</b>
                                        <input type="text" class="form-control text-center" name="CEP" id="CEP"
                                            placeholder="000000000" required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b class="ls-label-text" for="Endereco">Endereço</b>
                                        <input type="text" class="form-control text-center" name="Endereco"
                                            id="Endereco" placeholder="Rua, Travessa, Avenida" required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <b class="ls-label-text" for="Bairro">Bairro</b>
                                        <input type="text" class="form-control text-center" name="Bairro" id="Bairro"
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Cidade">Cidade</b>
                                        <input type="text" class="form-control text-center" name="Cidade" id="Cidade"
                                            required readonly>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <b class="ls-label-text" for="Estado">Estado</b>
                                        <input type="text" class="form-control text-center" name="Estado" id="Estado"
                                            minlength="2" maxlength="2" required readonly>
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
                                        <b class="ls-label-text" for="Email">Email</b>
                                        <input type="email" class="form-control text-center" name="Email" id="Email"
                                            placeholder="algo@algo.com" required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Telefone">Telefone</b>
                                        <input type="text" class="form-control text-center" name="Telefone"
                                            id="Telefone" required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Celular">Celular</b>
                                        <input type="text" class="form-control text-center" name="Celular" id="Celular"
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Comercial">Telefone Comercial</b>
                                        <input type="text" class="form-control text-center" name="Comercial"
                                            id="Comercial" required>
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
                                        <b class="ls-label-text" for="CPF">CPF</b>
                                        <input type="text" class="form-control text-center" name="CPF" id="CPF"
                                            maxlength="14" disabled required onblur="validarCPF(this)"
                                            placeholder="CPF não necessário">
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="RG">RG</b>
                                        <input type="text" class="form-control text-center" name="RG" id="RG" disabled
                                            minlength="4" maxlength="60" placeholder=" RG não necessário">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="CNPJ">CNPJ:</b>
                                        <input type="text" class="form-control text-center" name="CNPJ" id="CNPJ"
                                            onblur="validarCNPJ(this)" required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="IE">Inscrição Estadual</b>
                                        <input type="text" class="form-control text-center" name="IE" id="IE"
                                            minlength="9" maxlength="13" required>
                                        <div class="invalid-feedback">
                                            Mínimo 9 caracteres!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Tipo_Frete">Tipo de Frete</b>
                                        <select class="form-control text-center" id="Tipo_Frete" name="Tipo_Frete"
                                            required>
                                            <option value="">Selecione</option>
                                            <option value="KM">KM</option>
                                            <option value="Destino">Destino</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="FreteM">Frete por M</b>
                                        <input type="text" class="form-control text-center" name="FreteM"
                                            onblur="fretem()" id="FreteM" maxlength="10" minlength="1" value="0.00"
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="FreteM2">Frete por M<sup>2</sup></b>
                                        <input type="text" class="form-control text-center" name="FreteM2"
                                            onblur="fretem2()" id="FreteM2" maxlength="10" minlength="1" value="0.00"
                                            required>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="FreteM3">Frete por M<sup>3</sup></b>
                                        <input type="text" class="form-control text-center" name="FreteM3"
                                            onblur="fretem3()" id="FreteM3" maxlength="10" minlength="1" value="0.00"
                                            required>
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
                                        <b class="ls-label-text" for="FretePor">Tipo de Frete</b>
                                        <select class="form-control text-center" id="FretePor" name="FretePor" required>
                                            <option value="">Selecione</option>
                                            <option value="K">KM</option>
                                            <option value="D">Destino</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b class="ls-label-text" for="Empresa">Empresa</b>
                                        <select class="form-control text-center" id="Empresa" name="Empresa" required>
                                            <option value="">Selecione</option>
                                            @foreach($empresa as $empresa)
                                                @can("view_empresa",$empresa)
                                                    <option value="{{ $empresa->Codigo }}">
                                                        {{ $empresa->Nome_Fantasia }}
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
                            </div>
                        </div>

                        <!-- Destino -->
                        <div role="tabpanel" class="tab-pane fade" id="destino">
                            <div class="container">
                                <div class="form-row">
                                    <div class="form-group col-lg-12" hidden>
                                        <b class="ls-label-text" for="RG">User_ID:</b>
                                        <input type="text" class="form-control input-border-bottom" name="user_id"
                                            id="user_id" readonly value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-1" hidden>
                                        <label for="Cod_Transp">Transportadora:</label>
                                        <input type="text" class="form-control input-border-bottom" name="Cod_Transp"
                                            id="Cod_Transp" value="" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="Destino_Cidade">Cidade</label>
                                        <input type="text" class="form-control text-center" name="Destino_Cidade"
                                            id="Destino_Cidade" placeholder="Cidade" required minlength="3"
                                            maxlength="50">
                                        <div class="invalid-feedback">
                                            Campo Obrigatório, Mínimo 3 caracteres!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="Destino_UF">Estado de Destino</label>
                                        <select class="form-control text-center" id="Destino_UF" name="Destino_UF"
                                            required>
                                            <option value="">Selecione</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="Indice">Índice para cobrança</label>
                                        <input type="text" class="form-control text-center" name="Indice" id="Indice"
                                            maxlength="3" minlength="1" value="0.00" required onblur="indice()">
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="valor">
                            <div class="container">
                                <div class="form-row">
                                    <div class="form-group col-lg-12" hidden>
                                        <b class="ls-label-text" for="RG">User_ID:</b>
                                        <input type="text" class="form-control input-border-bottom" name="user_id"
                                            id="user_id" readonly value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-1" hidden>
                                        <label for="Cod_Transp">Transportadora:</label>
                                        <input type="text" class="form-control text-center" name="Cod_Transp"
                                            id="Cod_Transp" value="" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="KmIni">Km Inicial</label>
                                        <input type="text" class="form-control text-center" name="KmIni" id="KmIni"
                                            placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por Favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="KmFim">Km Final</label>
                                        <input type="text" class="form-control text-center" name="KmFim" id="KmFim"
                                            placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por Favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="Indice_v">Índice para cobrança</label>
                                        <input type="text" class="form-control text-center" name="Indice_v"
                                            id="Indice_v" minlength="1" value="0.00" required onblur="indice_v()">
                                        <div class="invalid-feedback">
                                            Por favor, Campo Obrigatório!
                                        </div>
                                        <div class="valid-feedback">
                                            Tudo certo!
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <!--<div id="formAdd">
                            <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $("#addForm").click(function () {
                                        $("#formAdd").append("<div class='form-row'>"
                                        +  "<div class='form-group col-lg-1' hidden>"
                                            +  "<b class='ls-label-text' for='RG'>User_ID:</b>"
                                             +  "<input type='text' class='form-control input-border-bottom' name='user_id[]' "
                                             + "id='user_id' readonly value='{{ Auth::user()->id }}'>"
                                            + "</div>"
                                        + "<div class='form-group col-lg-1' hidden>"
                                            +"<label for='Cod_Transp'>Transportadora:</label>"
                                                +"<input type='text' class='form-control text-center' name='Cod_Transp[]'"
                                                + "id='Cod_Transp' readonly>"
                                        +"</div>"
                                        +"<div class='form-group col-lg-4'>"
                                            +"<label for='KmIni'>Km Inicial</label>"
                                                +"<input type='text' class='form-control text-center' name='KmIni[]' id='KmIni' required>"
                                            +"<div class='invalid-feedback'>"
                                                +"Por Favor, Campo Obrigatório!"
                                            +"</div>"
                                            +"<div class='valid-feedback'>"
                                                +"Tudo certo!"
                                            +"</div>"
                                        + "</div>"
                                        +"<div class='form-group col-lg-4'>"
                                            +"<label for='KmFim'>Km Final</label>"
                                                +"<input type='text' class='form-control text-center' name='KmFim[]' id='KmFim' required>"
                                            +"<div class='invalid-feedback'>"
                                                +"Por Favor, Campo Obrigatório!"
                                            +"</div>"
                                            +"<div class='valid-feedback'>"
                                                +"Tudo certo!"
                                            +"</div>"
                                        + "</div>"
                                        +"<div class='form-group col-lg-4'>"
                                            +"<label for='Indice_v'>Indice de Conbrança</label>"
                                                +"<input type='text' class='form-control text-center' name='Indice_v[]' id='Indice_v' value='0.00' required onblur='indice_v()'>"
                                            +"<div class='invalid-feedback'>"
                                                +"Por Favor, Campo Obrigatório!"
                                            +"</div>"
                                            +"<div class='valid-feedback'>"
                                                +"Tudo certo!"
                                            +"</div>"
                                        + "</div>"
                                        + "</div>");
                                    });
                                });

                            </script>
                            </div>
                            <a type="button" class="btn btn-sm btn-info" id="addForm"><i class='fas fa-plus'> Linha</i></a>-->
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
                    <div class="form-row ml-3 mt-3">
                        {{ csrf_field() }}
                        <button class="btn btn-success" name="cadastrar">Cadastrar</button>
                        <input class="btn btn-secondary ml-5" id="reset" type='reset' value='Limpar Campos' />
                </form>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Formulário</button>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function _cnpj(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '') return false;

        if (cnpj.length != 14)
            return false;


        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;


        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;

    }

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

        }
    }

    function validarCPF(el) {
        if (!TestaCPF(el.value)) {

            alert("cpf inválido! - " + el.value);

            // apaga o valor
            el.value = "";
        } else {

        }
    }

</script>
<script>
    function verifica(value) {
        var cnpj = document.getElementById("CNPJ");
        var rg = document.getElementById("RG");
        var cpf = document.getElementById("CPF");

        if (value == "F") {
            cnpj.disabled = true;
            cnpj.placeholder = "CNPJ não necessário"
            cnpj.required = false;
            rg.disabled = false;
            rg.placeholder = "Somente os Números"
            cpf.disabled = false;
            cpf.required = true;
            cpf.placeholder = "Somente os Números"
        } else if (value == "J") {
            cnpj.disabled = false;
            cnpj.placeholder = "Somente os Números"
            cnpj.required = true;
            rg.disabled = true;
            rg.placeholder = "RG não necessário"
            cpf.disabled = true;
            cpf.required = false;
            cpf.placeholder = "CPF não necessário"
        }
    };

    function fretem() {
        var desc = parseFloat(document.getElementById('FreteM').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM').value = lim;
    }

    function fretem2() {
        var desc = parseFloat(document.getElementById('FreteM2').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM2').value = lim;
    }

    function fretem3() {
        var desc = parseFloat(document.getElementById('FreteM3').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('FreteM3').value = lim;
    }

    function indice() {
        var desc = parseFloat(document.getElementById('Indice').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Indice').value = lim;
    }

    function indice_v() {
        var desc = parseFloat(document.getElementById('Indice_v').value, 2);
        lim = desc.toFixed(2);
        document.getElementById('Indice_v').value = lim;
    }

</script>
