<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funcao;
use App\Turma;

class Colaboradores extends Model
{

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Colaboradores";
    protected $primarykey ="id";
    protected $fillable = [
        'nomCol',
        'corCol',
        'dtaNasc',
        'sexo',
        'estCivil',
        'gInst',
        'rg',
        'orgEmis',
        'dtaEmis',
        'cpfCol',
        'ctps',
        'serie',
        'dtaCtps',
        'pis',
        'tElei',
        'zona',
        'secao',
        'nomPai',
        'nomMae',
        'dtaAdmi',
        'funcao_id',
        'salario',
        'endCol',
        'comp',
        'numCasa',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'regTrab',
        'seguro',
        'contExp',
        'hEnt',
        'hAlmo',
        'hSai',
        'folga',
        'flag',
        'tel',
        'cel',
        'email',
        


        
    ];    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function searchColab(Array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['matricula']))
                $query->where('matricula', $data['matricula']);
            if (isset($data['nome']))
                $query->where('nomCol', 'like', '%'.$data['nome'].'%');
            if (isset($data['responsavel']))
                $query->where('responsavel', 'like', '%'. $data['responsavel'].'%');
            if(isset($data['flag']))
                $query->where('flag', 'like', '%' . $data['flag']. '%');

        })
        ->paginate(20);

    }

    public function funcao()
    {
        return $this->hasOne(Funcao::class, 'id', 'funcao_id');
    }

}
