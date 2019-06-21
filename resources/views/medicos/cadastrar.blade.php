@extends('layout')

@section('cabecalho')
        Cadastrar médico
        @endsection


@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
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
    @endsection
