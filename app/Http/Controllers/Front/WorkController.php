<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Http\Controllers\Controller;
use App\Models\WorkAerobePage;
class WorkController extends Controller
{
	public function index(Request $request)
	{
	    $workAerobePage = WorkAerobePage::find(1);
	    return view('front.work.index', compact('workAerobePage'));
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
        if ($request->hasFile('photo_file')) {
            // Upload new file
            $file = $request->file('photo_file');
            $photo = time().'_photo'.'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/work/'), $photo);
            #dd($photo);
            $request->merge(['photo'=> $photo]);
        }
        if ($request->hasFile('cv_file')) {
            // Upload new file
            $file = $request->file('cv_file');
            $cv = time().'_cv'.'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/work/'), $cv);
            $request->merge(['cv'=> $cv]);
        }
        Work::create($request->all());
        
        return redirect()->back()->with('success', 'Submitted successfully');
    }
}