<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AerobeAcademy extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'country_id',
        'short_description',
        'long_description',
        'status'
    ];

    protected $casts = [
        'country_id' => 'array', // Automatically converts JSON to array when retrieved
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
