<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryLocation extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
        'lat',
        'long',
    ];

    // CountryLocation.php
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
