<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = [
        'label',
        'code',
        'image',
        'is_main',
        'status'
    ];

    public function prominents()
    {
        return $this->hasMany(Prominent::class);
    }

    public function locations()
    {
        return $this->hasMany(CountryLocation::class);
    }
}
