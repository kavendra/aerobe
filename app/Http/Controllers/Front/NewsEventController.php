<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsAndEvent;
use App\Http\Controllers\Controller;

class NewsEventController extends Controller
{
	public function index(Request $request)
	{
		$newsAndEvents = NewsAndEvent::where('event_date', '>', date('Y-m-d'))->get();

		$parents = Category::with('aerobeAcademy')->get();
		$aerobeAcademies = $parents->flatMap(function ($parent) {
		    return $parent->aerobeAcademy;
		});
	    return view('front.knowledge-hub.index', compact('newsAndEvents', 'aerobeAcademies'));
	}
}