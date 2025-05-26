<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'testimonials';
    protected $fillable = [
        'label',
        'image',
        'country_id',
        'description',
        'status'
    ];
    
     protected $casts = [
        //'tag_id' => 'array', // Automatically converts JSON to array when retrieved
        'country_id' => 'array',
    ];

}
