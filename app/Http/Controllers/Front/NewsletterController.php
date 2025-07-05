<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
	public function subscribe(Request $request)
	{
	    $request->validate([
	        'email' => 'required|email|unique:subscribers,email',
	    ]);

	    $subscriber = Subscriber::create([
	        'email' => $request->email,
	    ]);

	    Mail::to($subscriber->email)->send(new NewsletterSubscribed($subscriber->email));

	    return response()->json(['success' => 'Thanks for subscribed to newsletter']);
	}
}