<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Csr extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'csrs';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'tag_id',
        'category_id',
        'short_description',
        'long_description',
        'author_name',
        'author_image',
        'event_date',
        'status',
        'country_id'
    ];

     protected $casts = [
        'tag_id' => 'array', // Automatically converts JSON to array when retrieved
        'country_id' => 'array',
    ];

    public function getEventDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('M d, Y'):'';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
