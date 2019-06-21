@extends('layout')


@section('cabecalho')
    Cadastro de especialidade
@endsection


@section('conteudo')

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="">Especialidade:</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <button class="btn btn-primary">Cadastrar</button>
    </form>

@endsection