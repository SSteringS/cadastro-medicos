<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Http\Requests\MedicosRequest;
use App\Medico;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    public function store(Request $request)
    {
        $especialidade = Especialidade::create($request->all());

        $request->session()->flash('mensagem', "Especialidade {$especialidade->id} 
        criada com suscesso {$especialidade->nome}");

        return redirect()->route('especialidades.index');
    }

    public function create()
    {
        return view('especialidades.cadastrar');
    }

    function index(Request $request)
    {
        $especialidades = Especialidade::query()->orderBy('nome')->get();

        return view('especialidades.index', compact('especialidades'));
    }
}

