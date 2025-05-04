<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'label',
        'status'
    ];

    public function ourPortfolios()
    {
        return $this->hasMany(OurPortfolio::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function csrs()
    {
        return $this->hasMany(Csr::class);
    }
}
