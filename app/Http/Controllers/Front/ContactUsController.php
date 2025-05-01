<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\ContactPage;
use App\Models\Country;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
	public function index(Request $request)
	{
		$countryName = strtoUpper(session('country'));
		$country = Country::where('is_main', 1)->where('label', $countryName)->first();
		$prefix = $country->prefix ?? 'glb_';
		$contactPage = ContactPage::first();
		
	    return view('front.contact-us.index', compact('contactPage', 'prefix'));
	}

	/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required',
        ]);

        ContactUs::create($request->all());
        
        return redirect()->back()->with('success', 'Successfully submitted');
    }
}