<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Download;
use App\Models\NewsAndEvent;
use App\Models\BusinessVertical;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        $homePage = HomePage::first();
        # dd(session('country'));
        $countryName = strtoUpper(session('country'));
        $country = Country::where('is_main', 1)->where('label', $countryName)->first();
        $newsAndEventsFirst = NewsAndEvent::where('is_home', 1)->where('is_main', 1)->where(function($query)use($country){
                                if($country) {
                                    $query->whereJsonContains('country_id', (string) $country->id);
                                }
                            })->latest()->first();
                           
        $newsAndEvents = NewsAndEvent::where('is_home', 1)->where(function($query)use($country){
                                if($country) {
                                    $query->whereJsonContains('country_id', (string) $country->id);
                                }
                            })->limit(4)->latest()->get();
        $businessVerticals = BusinessVertical::latest()->get();
        
        return view('front.home.index', compact('homePage', 'newsAndEvents', 'businessVerticals', 'newsAndEventsFirst'));
    }

    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return view('errors.404');
    }

    public function setCountry(Request $request)
    {
        $country = $request->query('country'); // get country from URL
        session(['country' => $country]);

        return redirect()->back(); // redirect back to previous page
    }
}
