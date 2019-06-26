<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
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
        return $this->hasOne(Especialidade::class);
    }

}