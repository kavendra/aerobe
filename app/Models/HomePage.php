<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $table = 'home_page';
    protected $fillable = [
        'gb_banner_title',
        'sg_banner_title',
        'au_banner_title',
        'in_banner_title',
        'my_banner_title',
        'banner_image',
        'banner_desc',
        'banner_button_text',

        'section_heading',
        'section_title',
        'section_image1',
        'section_image2',
        'section_image3',
        'section_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
