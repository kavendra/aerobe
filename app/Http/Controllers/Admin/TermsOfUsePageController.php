<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TermsOfUsePage; 

class TermsOfUsePageController extends Controller
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
    public function edit(TermsOfUsePage $termsOfUsePage)
    { 
        return view('admin.cms-pages.edit_terms_of_use_page',compact('termsOfUsePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TermsOfUsePage $termsOfUsePage)
    {
        
        $request->validate([
            'header_title' => 'required|string',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_desc' => 'nullable|string',
            
           
            
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);
        
       

        if ($request->hasFile('header_image')) {
            // Delete old file
            if ($termsOfUsePage->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $termsOfUsePage->site_logo))) {
                unlink(public_path('assets/uploads/cms-pages/' . $termsOfUsePage->site_logo));
            }

            // Upload new file
            $file = $request->file('header_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $filename);
            $termsOfUsePage->header_image = $filename;
        }

        
        $termsOfUsePage->header_title = $request->header_title;
        $termsOfUsePage->header_desc = $request->header_desc;
        
        $termsOfUsePage->terms_desc = $request->terms_desc;

        $termsOfUsePage->meta_title = $request->meta_title;
        $termsOfUsePage->meta_description = $request->meta_description;
        $termsOfUsePage->meta_keywords = $request->meta_keywords;

        $termsOfUsePage->save();

        return redirect()->route('admin.terms-of-use-page.edit', $termsOfUsePage->id)->with('success', 'Cookie reference Page updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
