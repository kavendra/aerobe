<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\ContactPage;
use App\Models\Country;
use App\Models\CountryLocation;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
        if(empty($country)) {
            $country = Country::where('is_main', 1)->where('is_default', 1)->first();
        }
		$prefix = $country->prefix ?? 'glb_';

        $locations = $country->locations->map(function ($loc) {
            return [
                'lat' => (float) $loc->lat,
                'lng' => (float) $loc->long,
                'title' => $loc->name
            ];
        });

        // Calculate center coordinates (average of lat/lng)
        $count = $locations->count();

        $center = [
            'lat' => $locations->sum('lat') / $count,
            'lng' => $locations->sum('lng') / $count
        ];
		$contactPage = ContactPage::first();
		
	    return view('front.contact-us.index', compact('contactPage', 'prefix', 'locations', 'center'));
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
            'message' => 'required',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'content' => $validated['message']
        ];
        ContactUs::create($data);
        
        /*Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('your-email@example.com')
                    ->subject('New Contact Form Message from');
        });*/
        if($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
        }
        return redirect()->back()->with('success', 'Submitted successfully');
    }
}