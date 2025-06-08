<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\OurPortfolio;
use App\Models\Download;
use App\Mail\ReportMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OurPortfolioController extends Controller
{
	public function show($slug)
	{
		$ourPortfolio = OurPortfolio::where('slug', $slug)->first();

	    return view('front.our-portfolio.show', compact('ourPortfolio'));
	}

	public function sendAttachment(Request $request)
	{
	    $request->validate([
	        'email' => 'required|email',
	    ]);
	    if($request->downloadid) {
		    $download = Download::find($request->downloadid)->first();

		    $data = [
		    	'filename' => $download->pdf
		    ];
			$filePath = public_path('assets/uploads/downloads/'.$download->pdf);
			# Mail::to($request->email)->send(new ReportMail($data, $filePath));
		}
	    return response()->json(['success' => 'Attachment sent to your email']);
	}
}