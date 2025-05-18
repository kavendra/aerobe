<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Csr;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class CsrController extends Controller
{
	public function index(Request $request)
	{
	    return view('front.csr.index');
	}

	public function show(Csr $csr)
	{
	    return view('front.csr.show', compact('csr'));
	}
}