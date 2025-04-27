<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KnowledgeHub extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'knowledge_hubs';
    protected $fillable = [
        'title',
        'image',
        'tag_id',
        'category_id',
        'short_description',
        'long_description',
        'author_name',
        'author_image',
        'event_date',
        'status'
    ];

     protected $casts = [
        'tag_id' => 'array', // Automatically converts JSON to array when retrieved
    ];
}
