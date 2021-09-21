<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fone extends Model
{
    protected $fillable = [
        'fone', 'type', 'aluno_id',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function Aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
