<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessVertical extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'business_verticals';
    protected $fillable = [
        'label',
        'logo',
        'link',
        'status'
    ];
}
