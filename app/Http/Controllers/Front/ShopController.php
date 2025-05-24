<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopRequest;
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
		if($request->ajax()) {
		    $shops = Shop::where(function($query)use($country){
	                        if($country) {
	                            $query->whereJsonContains('country_id', (string)$country->id);
	                        }
	                        })
							->paginate(6, ['*'], 'page', $request->get('page', 1));
							
		    $html = view('front.shop.item', compact('shops'))->render();

		    return response()->json([
		        'html' => $html,
	            'nextPage' => $shops->currentPage() + 1,
	            'hasMorePages' => $shops->hasMorePages()
		    ]);
		}
		$query = Shop::where(function($query) use ($country) {
		    if ($country) {
		        $query->whereJsonContains('country_id', (string) $country->id);
		    }
		});

		$total = $query->count(); // Get total matching records
		$shops = $query->paginate(6); // Get paginated/limited results

		return view('front.shop.index', compact('shops', 'total'));
	}

	/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:20',
            'description' => 'required',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'description' => $validated['description'],
        ];
        
        ShopRequest::create($data);
        
        /*Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('your-email@example.com')
                    ->subject('New Contact Form Message from');
        });*/
        if($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
        }
        return redirect()->back()->with('success', 'Submitted successfully');
    }

	public function show(Shop $shop)
	{
	    return view('front.shop.show', compact('shop'));
	}
}