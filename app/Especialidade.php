<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];


    public function medico()
    {
        return $this->hasMany(Medico::class);
    }
}
