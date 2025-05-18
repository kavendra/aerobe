<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsAndEvent;
use App\Models\Country;
use App\Http\Controllers\Controller;

class NewsEventController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		
		$featuredNewsAndEvents = NewsAndEvent::where('is_featured', 1)->limit(20)->get();

		$query = NewsAndEvent::query();
	    if ($country) {
	        $query->whereJsonContains('country_id', (string) $country->id);
	    }
	    if ($request->category_ids) {
	        $category_ids = explode(',', $request->category_ids);
	        $query->whereIn('category_id', $category_ids);
	    }
    	$newsAndEvents = $query->paginate(10);
		if($request->ajax()) {
			return view('front.news-event.item', compact('newsAndEvents'))->render();	
		}
		$parents = Category::with('aerobeAcademy')->get();
		$aerobeAcademies = $parents->flatMap(function ($parent) {
		    return $parent->aerobeAcademy;
		});
	    return view('front.news-event.index', compact('featuredNewsAndEvents', 'newsAndEvents', 'aerobeAcademies'));
	}

	public function show(NewsAndEvent $newsEvent)
	{
	    return view('front.news-event.show', compact('newsEvent'));
	}
}