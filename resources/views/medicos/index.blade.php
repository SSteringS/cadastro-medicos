@extends('layout')


@section('cabecalho')
    Médicos
@endsection


@section('conteudo')


    @if(!EMPTY($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{ route('form_cadastrar_medico') }}" class="btn btn-dark mb-2">Cadastrar médico</a>

    
    <ul class="list-group">
        @foreach($medicos as $medico)
            <li class="list-group-item d-flex-inline justify-content-start mb-2 border border-secondary rounded">


                <div class="row mb-2">
                    <div class="col-sm-4">
                        <div for="nome"><b>Nome:</b></div>
                        <div>{{$medico->nome}}</div>
                    </div>

                    <div class="col-sm-4">
                        <div for="qtd_temporadas"><b>Especialidade:</b></div>
                        <div>{{$medico->especialidade}}</div>
                    </div>

                    <div class="col-sm-2">
                        <div for="ep_por_temporada"><b>id:</b></div>
                        <div>{{$medico->id}}</div>
                    </div>

                    <div class="col-sm-2 d-flex align-items-center flex-row-reverse">
                    <form method="post" action="/medicos/remover/{{$medico->id}}"
                          onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>

                    <form method="post" action="/medicos/editar/{{$medico->id}}">
                        @csrf
                        <button class="btn btn-secondary btn-sm mr-2"><span class="fas fa-edit" aria-hidden="true"></span></button>
                    </form>

                    <form method="post" action="/medicos/ver/{{$medico->id}}">
                        @csrf
                        <button class="btn btn-secondary btn-sm mr-2"><span class="far fa-list-alt" aria-hidden="true"></span></button>
                    </form>
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
                        <input type="text" class="form-control" name="data_aniversario" id="data_aniversario">

                        <label for="telefone" class="">Telefone:</label>
                        <input type="text" class="form-control" name="telefone" id="telefone">

                        <label for="salario" class="">Média Salarial:</label>
                        <input type="text" class="form-control" name="salario" id="salario">

                        <label for=crm class="">CRM:</label>
                        <input type="text" class="form-control" name="crm" id="crm">

                    </div>

                    <button class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DE CADASTRO DE ESPECIALIDADE-->
    <div id="modalCadastroEspecialidade" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="jumbotron"><h1>Cadastro de Especialidade</h1></div>

                <form method="post" class="p-2">
                    @csrf
                    <div class="form-group">
                        <label for="nome" class="">Especialidade:</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>

                    <button class="btn btn-primary">Cadastrar</button>
                </form>
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
            $("#botao_modal_especialidade").click(function(){
                $("#modalCadastroEspecialidade").modal({backdrop: true});
            })
        })
    </script>

@endsection

