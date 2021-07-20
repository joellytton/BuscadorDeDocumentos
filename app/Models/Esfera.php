<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esfera extends Model
{
    protected $table = 'esfera';

    protected $fillable = ['nome','status'];

    public $timestamps = false;
}
