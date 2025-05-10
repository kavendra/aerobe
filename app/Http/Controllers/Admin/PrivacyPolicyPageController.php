<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyPage; 

class PrivacyPolicyPageController extends Controller
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
    public function edit(PrivacyPolicyPage $privacyPolicyPage)
    { 
        return view('admin.cms-pages.edit_privacy_policy_page',compact('privacyPolicyPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrivacyPolicyPage $privacyPolicyPage)
    {
        $request->validate([
            'header_heading' => 'required|string|max:255',
            'header_title' => 'required|string',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_desc' => 'nullable|string',
            
            'cookie_preference_desc' => 'required|string',
            
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);

        if ($request->hasFile('header_image')) {
            // Delete old file
            if ($privacyPolicyPage->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $privacyPolicyPage->site_logo))) {
                unlink(public_path('assets/uploads/cms-pages/' . $privacyPolicyPage->site_logo));
            }

            // Upload new file
            $file = $request->file('header_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $filename);
            $privacyPolicyPage->header_image = $filename;
        }

        $privacyPolicyPage->header_heading = $request->header_heading;
        $privacyPolicyPage->header_title = $request->header_title;
        $privacyPolicyPage->header_desc = $request->header_desc;
        
        $privacyPolicyPage->cookie_preference_desc = $request->cookie_preference_desc;

        $privacyPolicyPage->meta_title = $request->meta_title;
        $privacyPolicyPage->meta_description = $request->meta_description;
        $privacyPolicyPage->meta_keywords = $request->meta_keywords;

        $privacyPolicyPage->save();

        return redirect()->route('admin.privacy-policy-page.edit', $privacyPolicyPage->id)->with('success', 'Privacy Policy Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
