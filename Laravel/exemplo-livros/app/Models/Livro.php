<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'categoria',
        'codigo',
        'autor',
        'ebook',
        'tamanho',
        'peso', 
    ];

    public function rules() {
        return [
            'nome' => 'required|string',
            'categoria' => 'required|string',
            'codigo' => 'required|string',
            'autor' => 'required|string',
            'ebook' => 'required',
            'tamanho' => 'nullable',
            'peso' => 'nullable'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser uma string',
        ];
    }
}
