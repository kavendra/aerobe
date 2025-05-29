<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\OurPortfolio;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OurPortfolioController extends Controller
{
	public function show($slug)
	{
		$ourPortfolio = OurPortfolio::where('slug', $slug)->first();
	    return view('front.our-portfolio.show', compact('ourPortfolio'));
	}
}