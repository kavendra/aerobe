<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WorkAerobePage; 

class WorkAerobePageController extends Controller
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
    public function edit(WorkAerobePage $workAerobePage)
    { 
        return view('admin.cms-pages.edit_work_aerobe',compact('workAerobePage'));
    }

    public function update(Request $request, WorkAerobePage $workAerobePage)
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


        $bannerImage = $workAerobePage->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($workAerobePage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $workAerobePage->banner_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $workAerobePage->banner_image));
            }

            $file = $request->file('banner_image');
            $bannerImage = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/uploads/cms-pages/'), $bannerImage);
        }

        $workAerobePage->banner_title = $request->banner_title;
        $workAerobePage->banner_desc = $request->banner_desc;
        $workAerobePage->banner_image = $bannerImage;
       
        $workAerobePage->meta_title = $request->meta_title;
        $workAerobePage->meta_description = $request->meta_description;
        $workAerobePage->meta_keywords = $request->meta_keywords;
      
        $workAerobePage->save();
        return redirect()->route('admin.work-aerobe-page.edit', $workAerobePage->id)->with('success', 'Work @Aerobe Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
