<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\OurPortfolio;

class VideoController extends Controller
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
            $videos = Video::select('videos.id', 'videos.label', 'videos.status')
                        ->get();

            $videos = Video::select(
                'videos.id',
                'videos.label',
                'videos.status',
                'our_portfolios.title as title' // example additional field from join
            )
            ->join('our_portfolios', 'our_portfolios.id', '=', 'videos.product_id')
            ->get();

            return response()->json($videos, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ourPortfolios  = OurPortfolio::where('status', 1)->get();
        return view('admin.videos.create', compact('ourPortfolios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'product_id' => 'required',
            'url' => 'required'
        ]);

        $video = Video::create([
            'label' => $request->label,
            'product_id' => $request->product_id,
            'url' => $request->url,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Video created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Video $video)
    {
        $ourPortfolios  = OurPortfolio::where('status', 1)->get();
        return view('admin.videos.edit', compact('video', 'ourPortfolios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'product_id' => 'required',
            'url' => 'required',
            'status' => 'required'
        ]);

        $video->label = $request->label;
        $video->product_id = $request->product_id;
        $video->url = $request->url;
        $video->status = $request->status;
        $video->save();

        return redirect()->back()->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $delete = $video->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Video Deleted Successfully!";
            
        }else{
            $message = "Video not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
