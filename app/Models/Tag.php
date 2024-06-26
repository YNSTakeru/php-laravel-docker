<?php

namespace App\Models;

use App\Models\ArticleTagPivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, ArticleTagPivot::class, 'article_id', 'tag_id');
    }
}
