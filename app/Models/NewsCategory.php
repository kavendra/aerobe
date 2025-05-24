<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsCategory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'news_categories';
    protected $fillable = [
        'label',
        'status'
    ];

    public function newsAndEvents()
    {
        return $this->hasMany(NewsAndEvent::class, 'category_id');
    }
}
