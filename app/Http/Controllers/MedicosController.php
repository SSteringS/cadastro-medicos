<?php


namespace App\Http\Controllers;

use App\Especialidade;
use App\Http\Requests\MedicosRequest;
use App\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    function index(Request $request)
    {
    $medicos = Medico::query()->orderBy('nome')->get();

    $mensagem = $request->session()->get('mensagem');

    $especialidades = Especialidade::query()->orderBy('nome')->get();

    return view('medicos.index', compact('medicos','especialidades', 'mensagem'));
    }

    public function create()
    {
        $especialidades = Especialidade::query()->orderBy('nome')->get();
        return view('medicos.cadastrar', compact('especialidades'));
    }


    public function store(MedicosRequest $request)
    {
        $medico = new Medico();
        $medico->nome = $request->nome;
        $medico->email = $request->email;
        $medico->cpf = $request->cpf;
        $medico->especialidade = $request->especialidade;
        $medico->data_aniversario = $request->data_aniversario;
        $medico->telefone = $request->telefone;
        $medico->salario = $request->salario;
        $medico->crm = $request->crm;
        $medico->save();

        $request->session()->flash('mensagem', "Médico {$medico->id} 
        criada com suscesso {$medico->nome}");

        return redirect()->route('medicos.index');
    }

    public function destroy(Request $request)
    {
        $request->session()->flash('mensagem', "Médico 
        removido com suscesso ");
        Medico::destroy($request->id);

        return redirect()->route('medicos.index');
    }
}