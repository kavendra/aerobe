<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\AerobeAcademy;
use App\Http\Controllers\Controller;
use App\Models\AerobeAcademyPage;
class AcademyController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		
		if($request->ajax()) {
			$category = $request->category_id ?? '';
		    $academics = AerobeAcademy::where(function($query)use($country, $category){
	                        if($country) {
	                            $query->whereJsonContains('country_id', (string)$country->id);
	                        }if($category) {
	                            $query->where('category_id', $category);
	                        }
	                        })->paginate(6, ['*'], 'page', $request->get('page', 1));
			
		    $html = view('front.academy.item', compact('academics'))->render();
		    
		    return response()->json([
		        'html' => $html,
	            'nextPage' => ($request->page) ? $academics->currentPage() + 1 : '',
	            'hasMorePages' => ($request->page) ? $academics->hasMorePages() : ''
		    ]);
		}

		$aerobeAcademics = AerobeAcademy::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		})->orderBy('category_id');
		
		$aerobeAcademicsMain = AerobeAcademy::where(function($query) use ($country) {
		    if ($country) {
		        
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		    $query->where('is_main', 1);
		    
		})->orderBy('category_id')->first();

		$total = $aerobeAcademics->count(); // Get total matching records
		$aerobeAcademics = $aerobeAcademics->paginate(6)->groupBy('category_id')->flatten(); // Get paginated/limited results
		$aerobeAcademicsPage = AerobeAcademyPage::find(1);
		return view('front.academy.index', compact('aerobeAcademics', 'total', 'aerobeAcademicsMain', 'aerobeAcademicsPage'));
	}

	public function show($slug)
	{
		$academy = AerobeAcademy::where('slug', $slug)->first();
	    return view('front.academy.show', compact('academy'));
	}
}