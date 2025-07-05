<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;
    protected $table = 'websettings';
    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'pininterest_url',
        'footer_shortdesc',
        'copyright_text',
        'opening_hours',
        'customers_in_countries',
        'offices_in_countries',
        'facebook_url',
        'sg_instagram_url_1',
        'sg_instagram_url_2',
        'in_instagram_url_1',
        'in_instagram_url_2',
        'au_instagram_url',
        'my_instagram_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
       
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
