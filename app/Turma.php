<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turma extends Model
{
    protected $fillable = [
        'nomTurma', 'ano', 'colaborador_id','sala', 'turno', 'auxiliar', 'qtdVaga'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];
    


    public function colaboradores()
    {
        return $this->hasOne(Colaboradores::class, 'id', 'colaborador_id');
    } 

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'turmas_alunos', 'turma_id', 'aluno_id')->orderBy('nome');
    }

}

