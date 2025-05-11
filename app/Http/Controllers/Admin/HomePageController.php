<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomePage; 

class HomePageController extends Controller
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
    public function edit(HomePage $homePage)
    { 
        return view('admin.cms-pages.edit_home',compact('homePage'));
    }

    public function update(Request $request, HomePage $homePage)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_desc' => 'nullable|string|max:1000',
            'banner_button_text' => 'nullable|string|max:255',

            'section_heading' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_desc' => 'nullable|string|max:1000',
            'section_button_text' => 'nullable|string|max:1000',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);


        $bannerImage = $homePage->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($homePage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->banner_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $homePage->banner_image));
            }

            $file = $request->file('banner_image');
            $bannerImage = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/uploads/cms-pages/'), $bannerImage);
        }

        $sectionImage1 = $homePage->section_image1;
        if ($request->hasFile('section_image1')) {
            // Delete old file
            if ($homePage->section_image1 && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->section_image1))) {
                unlink(public_path('assets/uploads/cms-pages/' . $homePage->section_image1));
            }

            // Upload new file
            $file = $request->file('section_image1');
            $sectionImage1 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $sectionImage1);
            $homePage->section_image1 = $sectionImage1;
        }

        $sectionImage2 = $homePage->section_image2;
        if ($request->hasFile('section_image2')) {
            // Delete old file
            if ($homePage->section_image2 && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->section_image2))) {
                unlink(public_path('assets/uploads/cms-pages/' . $homePage->section_image2));
            }

            // Upload new file
            $file = $request->file('section_image2');
            $sectionImage2 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $sectionImage2);
            $homePage->section_image2 = $sectionImage2;
        }

        $sectionImage3 = $homePage->section_image3;
        if ($request->hasFile('section_image3')) {
            // Delete old file
            if ($homePage->section_image3 && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->section_image3))) {
                unlink(public_path('assets/uploads/cms-pages/' . $homePage->section_image3));
            }

            // Upload new file
            $file = $request->file('section_image3');
            $sectionImage3 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $sectionImage3);
            $homePage->section_image3 = $sectionImage3;
        }

        $sectionImage4 = $homePage->section_image4;
        if ($request->hasFile('section_image4')) {
            // Delete old file
            if ($homePage->section_image4 && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->section_image4))) {
                unlink(public_path('assets/uploads/cms-pages/' . $homePage->section_image4));
            }

            // Upload new file
            $file = $request->file('section_image3');
            $sectionImage4 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $sectionImage4);
            $homePage->section_image4 = $sectionImage4;
        }

        $homePage->banner_title = $request->banner_title;
        $homePage->banner_desc = $request->banner_desc;
        $homePage->banner_image = $bannerImage;
        $homePage->banner_button_text = $request->banner_button_text;
        $homePage->banner_button_link = $request->banner_button_link;

        $homePage->section_heading = $request->section_heading;
        $homePage->section_title = $request->section_title;
        $homePage->section_image1 = $sectionImage1;
        $homePage->section_image2 = $sectionImage2;
        $homePage->section_image3 = $sectionImage3;
        $homePage->section_image4 = $sectionImage4;
        $homePage->section_desc = $request->section_desc;
        $homePage->section_button_text = $request->section_button_text;
        $homePage->section_button_link = $request->section_button_link;
        

        $homePage->meta_title = $request->meta_title;
        $homePage->meta_description = $request->meta_description;
        $homePage->meta_keywords = $request->meta_keywords;
      
        $homePage->save();
        return redirect()->route('admin.home-page.edit', $homePage->id)->with('success', 'Home Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
