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

    public function aerobeAcademy()
    {
        return $this->hasMany(AerobeAcademy::class);
    }

    public function knowledgeHubs()
    {
        return $this->hasMany(KnowledgeHub::class);
    }

    public function newsAndEvents()
    {
        return $this->hasMany(NewsAndEvent::class);
    }

    public function getAllOurPortfolios()
    {
        $countryName = strtoUpper(session('country'));
        $country = Country::where('is_main', 1)->where('label', $countryName)->first();

        return $this->hasMany(OurPortfolio::class)->where(function($query)use($country){
                            if($country) {
                                $query->whereJsonContains('country_id', (string)$country->id);
                            }
                        });
    }

    public function getAllSolutions()
    {
        $countryName = strtoUpper(session('country'));
        $country = Country::where('is_main', 1)->where('label', $countryName)->first();

        return $this->hasMany(Solution::class)->where(function($query)use($country){
                            if($country) {
                                $query->whereJsonContains('country_id', (string)$country->id);
                            }
                        });
    }
}
