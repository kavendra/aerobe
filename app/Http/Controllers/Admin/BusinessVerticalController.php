<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessVertical;

class BusinessVerticalController extends Controller
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
            $business_verticals = BusinessVertical::select('business_verticals.id', 'business_verticals.label', 'business_verticals.logo', 'business_verticals.status')->get();

             return response()->json($business_verticals, 200, [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
        }


        // Handle normal page load
        return view('admin.business-verticals.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.business-verticals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'link' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ], [
            'label.required' => 'The title field is required.',
            'link.required' => 'The link field is required.',
            'logo.required' => 'An image is required.',
            'logo.image' => 'The file must be an image.',
            'logo.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'Image size must not exceed 5MB.',
        ]);

        if ($request->hasFile('logo')) {

            // Upload new file
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/business-verticals/'), $filename);
        }

        $businessVertical = BusinessVertical::create([
            'label' => $request->label,
            'link' => $request->link,
            'logo' => $filename,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Business Vertical created successfully!');
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
    public function edit(Request $request, BusinessVertical $businessVertical)
    {
        return view('admin.business-verticals.edit', compact('businessVertical'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessVertical $businessVertical)
    {
        $request->validate([
            'label' => 'required|string',
            'link' => 'required',
        ], [
            'label.required' => 'The title field is required.',
            'link.required' => 'The link field is required.',
        ]);

        if(empty($businessVertical->logo))
        {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ], [
                'logo.required' => 'An image is required.',
                'logo.image' => 'The file must be an image.',
                'logo.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
                'logo.max' => 'Image size must not exceed 5MB.',
            ]);
        }



        if ($request->hasFile('logo')) {
            // Delete old file
            if ($businessVertical->logo && file_exists(public_path('assets/uploads/business-verticals/' . $businessVertical->logo))) {
                unlink(public_path('assets/uploads/business-verticals/' . $businessVertical->logo));
            }

            // Upload new file
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/business-verticals/'), $filename);
            $businessVertical->logo = $filename;
        }

        $businessVertical->label = $request->label;
        $businessVertical->link = $request->link;
        $businessVertical->status = $request->status;
        $businessVertical->save();

        return redirect()->back()->with('success', 'Business Vertical  updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessVertical $businessVertical)
    {
        $delete = $businessVertical->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Business Vertical Deleted Successfully!";
            
        }else{
            $message = "Business Vertical  not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
