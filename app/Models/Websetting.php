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
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
        'linkedin_url',
        'pininterest_url',
        'footer_shortdesc',
        'copyright_text',
        'opening_hours',
        'customers_in_countries',
        'offices_in_countries',
      
        'meta_title',
        'meta_description',
        'meta_keywords',
      
       
        'from_name',
        'from_email',
        'to_name',
        'to_email',
        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption'        
    ];
}
