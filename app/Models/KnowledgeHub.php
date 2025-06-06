<?php

namespace App\Models;

use Carbon\Carbon;
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
        'slug',
        'image',
        'category_id',
        'country_id',
        'short_description',
        'long_description',
        'is_main',
        'status'
    ];

     protected $casts = [
        //'tag_id' => 'array', // Automatically converts JSON to array when retrieved
        'country_id' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getEventDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('M d, Y'):'';
    }
}
