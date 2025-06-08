<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurPortfolio extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'our_portfolios';
    protected $fillable = [
        'title',
        'slug',
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

    public function newsAndEvents()
    {
        return $this->hasMany(NewsAndEvent::class, 'product_id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'product_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'product_id');
    }
}
