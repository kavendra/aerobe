<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class SolutionController extends Controller
{
	public function show($slug)
	{
		$solution = Solution::where('slug', $slug)->first();
	    return view('front.solution.show', compact('solution'));
	}
}