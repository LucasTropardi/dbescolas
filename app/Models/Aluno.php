<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sala_id',
        'alNome',
        'alNumero',
        'alResponsavel',
        'alTelefone',
        'alEndereco',
        'alCidade',
        'alObs',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
