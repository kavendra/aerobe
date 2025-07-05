<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\ShopRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;
use App\Models\ShopPage;

class DownloadController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		if($request->ajax()) {
			$category = $request->category_id ?? '';
		    $downloads = Download::where(function($query)use($country, $category){
	                        if($country) {
	                            $query->whereJsonContains('country_id', (string)$country->id);
	                        }
	                        if($category) {
	                            $query->where('category_id', $category);
	                        }
	                        })
							->paginate(10, ['*'], 'page', $request->get('page', 1));
							
		    $html = view('front.download.item', compact('downloads'))->render();

		    return response()->json([
		        'html' => $html,
	            'nextPage' => ($request->page) ? $downloads->currentPage() + 1 : '',
	            'hasMorePages' => ($request->page) ? $downloads->hasMorePages() : '',
	            'total' => $downloads->total(),
		    ]);
		}
		$query = Download::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		});

		$total = $query->count(); // Get total matching records
		$downloads = $query->paginate(10); // Get paginated/limited results
		return view('front.home.download', compact('downloads', 'total'));
	}
}