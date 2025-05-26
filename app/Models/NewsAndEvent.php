<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsAndEvent extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'news_events';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'tag_id',
        'category_id',
        'country_id',
        'short_description',
        'long_description',
        'is_main',
        'is_home',
        'event_date',
        'status'
    ];


    protected $casts = [
        'tag_id' => 'array', // Automatically converts JSON to array when retrieved
        'country_id' => 'array',
    ];

    public function getEventDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('M d, Y'):'';
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
