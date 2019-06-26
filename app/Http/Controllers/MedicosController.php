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

        $idade = $this->VerIdade($medico->data_aniversario);

        if ($idade >= 20){
            $medico->save();
            $request->session()->flash('mensagem', "Médico(a) {$medico->id} 
                cradsatrado(a) suscesso {$medico->nome}");
                return redirect()->route('medicos.index');
        } else {
            $request->session()->flash('mensagem', "Médico precisar ter mais de 20 anos");
            return redirect()->route('medicos.index');
        }

    }

    public function destroy(Request $request)
    {
        $medico = Medico::find($request->id);
        if ($medico->crm == ""){
            $request->session()->flash('mensagem', "Médico 
            removido com suscesso ");
            Medico::destroy($request->id);
            return redirect()->route('medicos.index');
        } else {
            $request->session()->flash('mensagem', "Médico não pode ser excluido da base de dados");
            return redirect()->route('medicos.index');
        }
    }

    public function edit(int $id, MedicosRequest $request)
    {
        $medico = Medico::find($id);
        $medico->nome = $request->nome;
        $medico->email = $request->email;
        $medico->cpf = $request->cpf;
        $medico->especialidade = $request->especialidade;
        $medico->data_aniversario = $request->data_aniversario;
        $medico->telefone = $request->telefone;
        $medico->salario = $request->salario;
        $medico->crm = $request->crm;
        if ($this->VerIdade($medico->data_aniversario)>=20){
            $medico->save();
        } else {
        }
    }

    public function VerIdade($data_aniversario)
    {
        $data = $data_aniversario;

        list($dia, $mes, $ano) = explode('/', $data);

        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
    }


}