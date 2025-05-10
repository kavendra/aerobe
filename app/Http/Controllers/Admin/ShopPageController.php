<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopPage; 

class ShopPageController extends Controller
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
    public function edit(ShopPage $shopPage)
    { 
        return view('admin.cms-pages.edit_shop',compact('shopPage'));
    }

    public function update(Request $request, ShopPage $shopPage)
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


        $bannerImage = $shopPage->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($shopPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $shopPage->banner_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $shopPage->banner_image));
            }

            $file = $request->file('banner_image');
            $bannerImage = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/uploads/cms-pages/'), $bannerImage);
        }

        $shopPage->banner_title = $request->banner_title;
        $shopPage->banner_desc = $request->banner_desc;
        $shopPage->banner_image = $bannerImage;
       
        $shopPage->meta_title = $request->meta_title;
        $shopPage->meta_description = $request->meta_description;
        $shopPage->meta_keywords = $request->meta_keywords;
      
        $shopPage->save();
        return redirect()->route('admin.shop-page.edit', $shopPage->id)->with('success', 'Shop Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
