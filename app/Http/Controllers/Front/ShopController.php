<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		$shops = Shop::where(function($query)use($country){
                        if($country) {
                            $query->whereJsonContains('country_id', (string)$country->id);
                        }
                        })->get();
	    return view('front.shop.index', compact('shops'));
	}
}