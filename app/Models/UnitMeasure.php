<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasure extends Model
{
    use HasFactory;

    protected $table = 'unit_measures'; // Nome da tabela no banco de dados

    protected $guarded = []; // Permitir preenchimento em massa de todos os campos
}
