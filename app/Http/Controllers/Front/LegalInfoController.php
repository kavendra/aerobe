<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\TermsOfUsePage;
use Illuminate\Support\Facades\Mail;
use App\Models\PrivacyPolicyPage;
use App\Models\CookiePreferencePage;
use App\Http\Controllers\Controller;

class LegalInfoController extends Controller
{
	public function index(Request $request, $page)
	{
		if($page == 'terms') {
			$legalInfo = TermsOfUsePage::first();
			$desc = $legalInfo->terms_desc;
		}elseif($page == 'privacy') {
			$legalInfo = PrivacyPolicyPage::first();
			$desc = $legalInfo->privacy_desc ?? null;
		}elseif($page == 'cookie-preferences') {
			$legalInfo = CookiePreferencePage::first();
			$desc = $legalInfo->cookie_preference_desc;
		}
	    return view('front.legal-pages.index', compact('page', 'legalInfo', 'desc'));
	}
}