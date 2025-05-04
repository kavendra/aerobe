<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
	public function index(Request $request)
	{
	    return view('front.work.index');
	}

	/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Work::create($request->all());
        
        return redirect()->back()->with('success', 'Successfully submitted');
    }
}