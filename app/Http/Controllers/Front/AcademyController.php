<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\NewsAndEvent;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		$newsAndEvents = NewsAndEvent::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		})
		->where('event_date', '>', date('Y-m-d'))
		->get();

		$parents = Category::with('aerobeAcademy')->get();
		$aerobeAcademies = $parents->flatMap(function ($parent) {
		    return $parent->aerobeAcademy;
		});
	    return view('front.academy.index', compact('newsAndEvents', 'aerobeAcademies'));
	}
}