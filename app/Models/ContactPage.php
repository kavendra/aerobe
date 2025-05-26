<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    protected $table = 'contact_page';
    protected $fillable = [
        'header_title',
        'header_image',
        'header_desc',
        'glb_call_us_today',
        'glb_tech_support_email',
        'glb_chat_with_us_email',
        'glb_enquiry_email',
        'glb_company_name',
        'glb_company_address',

        'sg_call_us_today',
        'sg_tech_support_email',
        'sg_chat_with_us_email',
        'sg_enquiry_email',
        'sg_company_name',
        'sg_company_address',

        'au_call_us_today',
        'au_tech_support_email',
        'au_chat_with_us_email',
        'au_enquiry_email',
        'au_company_name',
        'au_company_address',

        'in_call_us_today',
        'in_tech_support_email',
        'in_chat_with_us_email',
        'in_enquiry_email',
        'in_company_name',
        'in_company_address',

        'my_call_us_today',
        'my_tech_support_email',
        'my_chat_with_us_email',
        'my_enquiry_email',
        'my_company_name',
        'my_company_address',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
