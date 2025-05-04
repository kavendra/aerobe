<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone',
        'education',
        'organisation',
        'designation',
        'salary',
        'experience',
        'description',
        'total_experience',
        'previous_organisation',
        'previous_designation',
        'previous_joining_date',
        'previous_leaving_date',
        'additional_information',
        'want_to_work',
        'photo',
        'cv',
    ];
}
