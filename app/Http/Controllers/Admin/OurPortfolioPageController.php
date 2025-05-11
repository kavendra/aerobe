<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurPortfolioPage; 

class OurPortfolioPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(OurPortfolioPage $ourPortfolioPage)
    { 
        return view('admin.cms-pages.edit_our_portfolio_page',compact('ourPortfolioPage'));
    }

    public function update(Request $request, OurPortfolioPage $ourPortfolioPage)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_desc' => 'nullable|string|max:1000',
          
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);


        $bannerImage = $ourPortfolioPage->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($ourPortfolioPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $ourPortfolioPage->banner_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $ourPortfolioPage->banner_image));
            }

            $file = $request->file('banner_image');
            $bannerImage = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/uploads/cms-pages/'), $bannerImage);
        }

        $ourPortfolioPage->banner_title = $request->banner_title;
        $ourPortfolioPage->banner_desc = $request->banner_desc;
        $ourPortfolioPage->banner_image = $bannerImage;
       
        $ourPortfolioPage->meta_title = $request->meta_title;
        $ourPortfolioPage->meta_description = $request->meta_description;
        $ourPortfolioPage->meta_keywords = $request->meta_keywords;
      
        $ourPortfolioPage->save();
        return redirect()->route('admin.our-portfolio-page.edit', $ourPortfolioPage->id)->with('success', 'Our Portfolio Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
