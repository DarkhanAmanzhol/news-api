<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['category_id', 'header', 'body', 'preview', 'date_published', 'views'];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
