<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'solutions';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'main_img',
        'thumb_img',
        'category_id',
        'country_id',
        'short_description',
        'long_description',
        'status',
        'read_more'
    ];

    protected $casts = [
        'country_id' => 'array', // Automatically converts JSON to array when retrieved
    ];
}
