<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            // Handle AJAX Request (For Grid.js, DataTables, etc.)
            $subscribers = Subscriber::get();

            return response()->json($subscribers, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.newsletter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $newsletter)
    {
        $delete = $newsletter->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Newsletter Deleted Successfully!";
            
        }else{
            $message = "Newsletter not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
