<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'user_roles';
    protected $fillable = [
        'label',
        'status'
    ];
}
