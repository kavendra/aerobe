<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\NewsAndEvent;
use App\Models\AerobeAcademy;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		$aerobeAcademics = AerobeAcademy::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		})->orderBy('category_id')->get()->groupBy('category_id');

		$upcomingNewsAndEvents = NewsAndEvent::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		})
		->where('event_date', '>', date('Y-m-d'))
		->get();

		return view('front.academy.index', compact('aerobeAcademics', 'upcomingNewsAndEvents'));
	}
}