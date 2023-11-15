<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'esNome',
        'esTelefone',
        'esEndereco',
        'esCidade',
        'esObs',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
