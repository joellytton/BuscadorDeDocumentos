<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoLink extends Model
{
    protected $table = 'documento_link';

    protected $fillable = ['link', 'documento_id'];

    public $timestamps = false;
}
