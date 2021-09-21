<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{

    public function colaborador()
    {
        return $this->belongsTo(Colaboradores::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcao_nome', 'funcao_desc', 'funcao_obs',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];
}
