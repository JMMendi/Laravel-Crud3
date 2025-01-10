<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'disponible', 'category_id'];

    // un articulo pertenece a una categoría
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
