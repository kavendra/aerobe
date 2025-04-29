<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\MainMenu;
use App\Models\NewsAndEvent;
use App\Models\BusinessVertical;
use App\Models\Category;
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
        $newsAndEvents = NewsAndEvent::limit(3)->latest()->get();
        $businessVerticals = BusinessVertical::latest()->get();
        
        return view('front.home.index', compact('homePage', 'newsAndEvents', 'businessVerticals'));
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
        
        if (!empty($country)) {
            session(['country' => $country]);
        }

        return redirect()->back(); // redirect back to previous page
    }
}
