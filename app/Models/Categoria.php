<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    protected $fillable = ['nome', 'data_criacao', 'data_atualizacao', 'id_usuario', 'status'];

    public static function buscarPorNome(string $nome)
    {
        $categorias = self::where('nome', 'LIKE', "%" . $nome . "%")->get();

        $response = array();
        foreach ($categorias as $categoria) {
            $response[] = array(
                "id" => $categoria->id,
                "text" => $categoria->nome
            );
        }

        return response()->json($response);
    }
}
