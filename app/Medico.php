<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'nome',
        'email',
        'cpf',
        'especialidade',
        'data_aniversario',
        'telefone',
        'salario',
        'crm',

];

    public function especialidades()
    {
        return $this->belongsTo(Especialidade::class);
    }

}