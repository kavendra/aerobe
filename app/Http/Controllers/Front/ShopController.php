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
		$perPage = 6;
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		if($request->ajax()) {
			$page = $request->get('page', 1);
		    $shops = Shop::where(function($query)use($country){
	                        if($country) {
	                            $query->whereJsonContains('country_id', (string)$country->id);
	                        }
	                        })
							->skip(($page - 1) * $perPage)
		                	->take($perPage)
							->get();

		    $html = view('front.shop.item', compact('shops'))->render();

		    return response()->json([
		        'html' => $html,
		        'next_page' => $shops->count() < $perPage ? null : $page + 1
		    ]);
		}
		$query = Shop::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		});

		$total = $query->count(); // Get total matching records
		$shops = $query->limit(3)->get(); // Get paginated/limited results

		return view('front.shop.index', compact('shops', 'total', 'perPage'));
	}
}