<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\ContactPage;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		$prefix = $country->prefix;
		$contactPage = ContactPage::first();

	    return view('front.contact-us.index', compact('contactPage', 'prefix'));
	}
}