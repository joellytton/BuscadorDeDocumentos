<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecomendacaoLink extends Model
{
    protected $table = 'recomendacao_link';

    protected $fillable = ['link', 'recomendacao_id' ];

    public $timestamps = false;
}
