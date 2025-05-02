<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\AboutPage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
	public function index(Request $request)
	{
		$aboutUs = AboutPage::first();
	    return view('front.academy.index', compact('aboutUs'));
	}
}