<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
	public function index(Request $request)
	{
		$shops = Shop::get();
	    return view('front.shop.index', compact('shops'));
	}
}