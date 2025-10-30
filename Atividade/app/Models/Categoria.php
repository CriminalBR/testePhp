<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

//permite preenchimento em massa do campo NOME  , ele tenta prencher os atributos do modelo com base nos dados que você passou no array.
    protected $fillable = ['nome'];

    public function tarefas(){
         // uma categoria tem muitas tarefas
        return $this->hasMany(Tarefa::class);
    }
}

