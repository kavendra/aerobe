<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AerobeAcademyPage; 

class AerobeAcademyPageController extends Controller
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
    public function edit(AerobeAcademyPage $aerobeAcademyPage)
    { 
        return view('admin.cms-pages.edit_aerobe_academy_page',compact('aerobeAcademyPage'));
    }

    public function update(Request $request, AerobeAcademyPage $aerobeAcademyPage)
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


        $bannerImage = $aerobeAcademyPage->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($aerobeAcademyPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $aerobeAcademyPage->banner_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $aerobeAcademyPage->banner_image));
            }

            $file = $request->file('banner_image');
            $bannerImage = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/uploads/cms-pages/'), $bannerImage);
        }

        $aerobeAcademyPage->banner_title = $request->banner_title;
        $aerobeAcademyPage->banner_desc = $request->banner_desc;
        $aerobeAcademyPage->banner_image = $bannerImage;
       
        $aerobeAcademyPage->meta_title = $request->meta_title;
        $aerobeAcademyPage->meta_description = $request->meta_description;
        $aerobeAcademyPage->meta_keywords = $request->meta_keywords;
      
        $aerobeAcademyPage->save();
        return redirect()->route('admin.aerobe-academy-page.edit', $aerobeAcademyPage->id)->with('success', 'Knowledge Hub Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
