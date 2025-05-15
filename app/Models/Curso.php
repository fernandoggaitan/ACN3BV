<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    //protected $table = 'cursos';

    protected $fillable = ['titulo', 'descripcion', 'precio', 'visible'];

    public function precio_format()
    {
        return '$' . number_format($this->precio, 2, ',', '.');
    }

}
