@extends('layout')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    @endsection



@section('cabecalho')

    Médicos
@endsection


@section('conteudo')
    <!--menssagens-->
    @include('erros', ['errors' => $errors])

    @if(!EMPTY($mensagem))
        <div class="alert alert-secondary">
            {{ $mensagem }}
        </div>
    @endif

    <h4>Listagem de medicos:</h4>

    <ul class="list-group">
        @foreach($medicos as $medico)
            <li class="list-group-item d-flex-inline justify-content-start mb-2 border border-secondary rounded">


                <div class="row mb-2">
                    <div class="col-sm-4">
                        <div for="nome"><b>Nome:</b></div>
                        <div>{{$medico->nome}}</div>
                    </div>

                    <div class="col-sm-4">
                        <div for="especialidade"><b>Especialidade:</b></div>
                        <div>{{$medico->especialidade}}</div>
                    </div>

                    <div class="col-sm-2">
                        <div for="id"><b>id:</b></div>
                        <div>{{$medico->id}}</div>
                    </div>

                    <div class="col-sm-2 d-flex align-items-center flex-row-reverse">
                        <form method="post" action="/medicos/remover/{{$medico->id}}"
                              onsubmit="return confirm('Tem certeza?')">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            @csrf
                        </form>


                        <button id="{{$medico->id}}" onclick="autoCompletaEdita({{$medico}})" class="btn-edit btn btn-secondary btn-sm mr-2"><span class="fas fa-edit" aria-hidden="true"></span></button>


                        <button class="btn-list btn btn-secondary btn-sm mr-2" onclick="autoCompletaVer({{$medico}})"><span class="far fa-list-alt" aria-hidden="true"></span></button>

                    </div>

                </div>


                <span class="d-flex justify-content-start">

                </span>

            </li>
        @endforeach
    </ul>

    <button id="botao_modal" class="btn btn-primary mb-2">Cadastrar médico</button>
    <a href="{{ route('form_cadastrar_especialidade') }}" class="btn btn-primary mb-2">Cadastrar especialidade</a>

@endsection

@section('modais')

    <!-- MODAL DE CADASTRO DE MEDICO-->
    <div id="modalCadastro" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="jumbotron"><h1>Cadastro de Médico</h1></div>

                <form method="post" class="p-2">
                    @csrf
                    <div class="form-group">
                        <label for="nome" class="">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome">

                        <label for="email" class="">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email">

                        <label for="cpf" class="">CPF:</label>
                        <input type="text" class="form-control" name="cpf" id="cpf">

                        <label for="especialidade" class="">Especialidade:</label>
                        <select id="especialidade" name="especialidade" class="form-control">
                            @foreach($especialidades as $especialidade)
                                <option>{{$especialidade->nome}}</option>
                            @endforeach
                        </select>

                        <label for="data_aniversario" class="">Data de aniversário:</label>
                        <input type="taxt" class="form-control" name="data_aniversario" id="data_aniversario">


                        <label for="telefone" class="">Telefone:</label>
                        <input type="text" placeholder="99999-9999" class="form-control" name="telefone" id="telefone">

                        <label for="salario" class="">Média Salarial:</label>
                        <input type="text" class="form-control" name="salario" id="salario">

                        <label for=crm class="">CRM:</label>
                        <input type="text" class="form-control" name="crm" id="crm">

                    </div>

                    <button class="btn btn-primary">Cadastrar</button>
                </form>

                <button class="btn btn-primary btn-sm" onclick="voltar()">Voltar</button>

            </div>
        </div>
    </div>

    <!-- MODAL DE EDITAR MEDICO-->
    <div id="modalEditarMedico" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="jumbotron" id="nome-medico-edita" ></div>

                    <div class="form-group p-2">

                        <label for="nome" class="">Nome:</label>
                        <input type="text" class="form-control mb-2" name="nome" id="nomee" value="">

                        <label for="email" class="">E-mail:</label>
                        <input type="email" class="form-control mb-2" name="email" id="emaile" value="">

                        <label for="cpf" class="">CPF:</label>
                        <input type="text" class="form-control mb-2" name="cpf" id="cpfe" value="">

                        <label for="especialidade" class="">Especialidade:</label>
                        <select id="especialidadee" name="especialidade" class="form-control mb-2" value="">
                            @foreach($especialidades as $especialidade)
                                <option>{{$especialidade->nome}}</option>
                            @endforeach
                        </select>

                        <label for="data_aniversarioe" class="">Data de aniversário:</label>
                        <input type="text" class="form-control mb-2" name="data_aniversario" id="data_aniversarioe" value="">

                        <label for="telefone" class="">Telefone:</label>
                        <input type="text" class="form-control mb-2" name="telefone" id="telefonee" value="">

                        <label for="salario" class="">Média Salarial:</label>
                        <input type="text" class="form-control mb-2" name="salario" id="salarioe" value="">

                        <label for=crm class="">CRM:</label>
                        <input type="text" class="form-control mb-3" name="crm" id="crme" value="">

                        <span id="btn-salvaedicao" class="mt-2"></span>
                        @csrf

                        <button onclick="voltar()" class="btn btn-primary"> Voltar </button>
                    </div>

            </div>
        </div>
    </div>

    <!--MODAL EXIBIR-->
    <div id="modalVer" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="jumbotron nome-medico"></div>

                <div class="form-group p-2">

                    <label for="nome" class=""><b>Nome:</b></label>
                    <div id="nomes" class="mb-3">  </div>

                    <label for="email" class=""><b>E-mail:</b></label>
                    <div id="emails" class="mb-3"> </div>

                    <label for="cpf" class=""><b>CPF:</b></label>
                    <div id="cpfs" class="mb-3"> </div>

                    <label for="especialidade" class=""><b>Especialidade:</b></label>
                    <div id="especialidadess" class="mb-3"> </div>

                    <label for="data_aniversario" class=""><b>Data de aniversário:</b></label>
                    <div id="data_aniversarios" class="mb-3"> </div>

                    <label for="telefone" class=""><b>Telefone:</b></label>
                    <div id="telefones" class="mb-3"> </div>

                    <label for="salario" class=""><b>Média Salarial:</b></label>
                    <div id="salarios" class="mb-3"> </div>

                    <label for=crm class=""><b>CRM:</b></label>
                    <div id="crms" class="mb-3"> </div>

                </div>

                <button class="btn btn-primary" onclick="voltar()">Fechar</button>
                @csrf
            </div>
        </div>
    </div>




    <!-- SCRIPTS-->
    <script>
        $(document).ready(function () {
            $("#botao_modal").click(function(){
                $("#modalCadastro").modal({backdrop: true});
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $(".btn-list").click(function(){
                $("#modalVer").modal({backdrop: true});
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $("#botao_modal_especialidade").click(function(){
                $("#modalCadastroEspecialidade").modal({backdrop: true});
            })
        })
    </script>


    <script>
        function autoCompletaEdita(medico){
            document.querySelector("#nomee").value=medico.nome;
            document.querySelector("#emaile").value=medico.email;
            document.querySelector("#cpfe").value=medico.cpf;
            document.querySelector("#especialidadee").value=medico.especialidade;
            document.querySelector("#data_aniversarioe").value=medico.data_aniversario;
            document.querySelector("#telefonee").value=medico.telefone;
            document.querySelector("#salarioe").value=medico.salario;
            document.querySelector("#crme").value=medico.crm;
            document.querySelector("#crme").value=medico.crm;
            document.querySelector("#nome-medico-edita").innerHTML=`<h1>${medico.nome}</h1>`;
            document.querySelector("#btn-salvaedicao").innerHTML= `<button class="btn btn-primary" id="btn-salvaedicao" onclick="editarMedico(${medico.id})">Salvar</button>`;
        }

    </script>

    <script>
        function autoCompletaVer(medico){
            document.querySelector("#nomes").innerHTML=medico.nome;
            document.querySelector("#emails").innerHTML=medico.email;
            document.querySelector("#cpfs").innerHTML=medico.cpf;
            document.querySelector("#especialidadess").innerHTML=medico.especialidade;
            document.querySelector("#data_aniversarios").innerHTML=medico.data_aniversario;
            document.querySelector("#telefones").innerHTML=medico.telefone;
            document.querySelector("#salarios").innerHTML=medico.salario;
            document.querySelector("#crms").innerHTML=medico.crm;
            document.querySelector(".nome-medico").innerHTML= `<h1>${medico.nome} </h1>`;
        }

    </script>

    <script>
        $(document).ready(function (medicos) {
            $(".btn-edit").click(function(e){
                $("#modalEditarMedico").modal({backdrop: true});
                })
            })

    </script>

    <script>
    function editarMedico(medicoId){
        let formData = new FormData;
        const nome = document.querySelector('#nomee').value;
        const email = document.querySelector('#emaile').value;
        const cpf = document.querySelector('#cpfe').value;
        const especialidade = document.querySelector('#especialidadee').value;
        const data_aniversario = document.querySelector('#data_aniversarioe').value;
        const telefone = document.querySelector('#telefonee').value;
        const salario = document.querySelector('#salarioe').value;
        const crm = document.querySelector('#crme').value;
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('nome', nome);
        formData.append('email', email);
        formData.append('cpf', cpf);
        formData.append('especialidade', especialidade);
        formData.append('data_aniversario', data_aniversario);
        formData.append('telefone', telefone);
        formData.append('salario', salario);
        formData.append('crm', crm);
        formData.append('_token', token);

        const url = `/medicos/${medicoId}/editar`;
        fetch(url, {
            body:formData,
            method:'POST'
        }).then(()=>{
            window.location.reload();
        })
    }
    </script>


    <!-- Mascaras -->
    <script>
        $(document).ready(function(){
            <!--Mascara de cadastro-->
            $('#data_aniversario').mask('00/00/0000')
            $('#telefone').mask('(00) 00000-0000'); //Máscara para telefone
            $('#cpf').mask('000.000.000-00', {reverse: true}); //Máscara para CPF
            $('#salario').mask("R$ ##.##0,00", {reverse: true}); //Máscara para salário
            <!--Mascara de edicao-->
            $('#data_aniversarioe').mask('00/00/0000')
            $('#telefonee').mask('(00) 00000-0000');
            $('#cpfe').mask('000.000.000-00', {reverse: true});
            $('#salarioe').mask("R$ ##.##0,00", {reverse: true});
        })
    </script>

    <script>
        function voltar(){
            window.location.reload();
        }
    </script>

@endsection

