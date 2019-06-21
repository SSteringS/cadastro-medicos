@extends('layout')


@section('cabecalho')
    Médicos
@endsection


@section('conteudo')


    <a href="{{ route('form_cadastrar_medico') }}" class="btn btn-dark mb-2">Cadastrar médico</a>

    <a href="{{ route('form_cadastrar_especialidade') }}" class="btn btn-dark mb-2">Cadastrar especialidade</a>

    <ul class="list-group">
        @foreach($especialidades as $especialidade)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $especialidade->nome }}
            </li>
        @endforeach
    </ul>
@endsection