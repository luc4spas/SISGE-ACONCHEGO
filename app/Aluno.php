<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image','matricula', 'status','nome', 'image', 'dta_nasc','dta_mat', 'sexo','endereco', 'numero', 'bairro', 'cep', 'cidade', 'uf', 'cor', 'nome_pai', 'cpf_pai', 'nasc_pai', 'prof_pai', 'nome_mae', 'cpf_mae', 'nasc_mae', 'prof_mae', 'responsavel', 'nacionalidade', 'profissao', 'email', 'fone', 'cel', 'obs', 'obsH','turma', 'status'
    ];    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Matricual',
    ];

    public function searchAluno(Array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['matricula']))
                $query->where('matricula', $data['matricula']);
            if (isset($data['nome']))
                $query->where('nome', 'like', '%'.$data['nome'].'%');
            if (isset($data['responsavel']))
                $query->where('responsavel', 'like', '%'. $data['responsavel'].'%');
            if (isset($data['dta_mat']))
                $query->where('dta_mat', $data['dta_mat']);
            

        })
        ->paginate();

    }

    /*public function getDtanascAttribute()
    {
        $nascimento = explode('-', $this->attributes['dta_nasc']);
        $nascimento = $nascimento[2] . '/' . $nascimento[1] . '/' . $nascimento[0];
        return ($nascimento);
    }*/

 
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'turmas_alunos', 'aluno_id', 'turma_id');
    } 

    public function phone()
    {
        return $this->hasMany(Fone::class, 'id', 'aluno_id');
    }

}