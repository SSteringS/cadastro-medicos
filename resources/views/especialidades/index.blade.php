@extends('layout')


@section('cabecalho')
    Escpecialidades
@endsection


@section('conteudo')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Especialidade</th>
                <th scope="col">Id</th>
            </tr>
        </thead>
        <tbody>
        @foreach($especialidades as $especialidade)
        <tr>
            <th scope="row">{{$especialidade->nome}}</th>
            <td>{{$especialidade->id}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/medicos/cadastrar_especialidade"><button class="btn btn-primary">Cadastrar especialidade</button></a>
    <a href="/medicos"><button class="btn btn-primary">Voltar</button></a>
@endsection