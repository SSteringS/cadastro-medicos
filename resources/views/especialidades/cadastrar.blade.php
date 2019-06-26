@extends('layout')


@section('cabecalho')
    Cadastro de especialidade
@endsection


@section('conteudo')

    <div class="d-inline">

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="">Especialidade:</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class=""><button class="btn btn-primary">Cadastrar</button></div>
    </form>

        <div><a href="/medicos"> <button class="btn btn-primary mt-2" onclick="voltar()">Voltar</button></a></div>

    </div>

@endsection