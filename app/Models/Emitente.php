<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emitente extends Model
{
    protected $table = 'emitente';

    protected $fillable = ['nome','status'];

    public $timestamps = false;
}
