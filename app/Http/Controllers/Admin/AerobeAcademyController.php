<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AerobeAcademy;
use App\Models\Category;
use App\Models\Country;

class AerobeAcademyController extends Controller
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
            $aerobe_academies = AerobeAcademy::leftJoin('categories', 'categories.id', '=', 'aerobe_academies.category_id')
                                            ->select(
                                                'aerobe_academies.id',
                                                'aerobe_academies.title',
                                                'aerobe_academies.image',
                                                'categories.label',
                                                'aerobe_academies.status'
                                            )
                                            ->get();

            return response()->json($aerobe_academies, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.aerobe-academies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.aerobe-academies.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ], [
            'title.required' => 'The title field is required.',
            'slug.required' => 'The slug field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Image size must not exceed 5MB.',
        ]);


        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/aerobe-academies/'), $imageName);
        }

        $aerobe_academies = AerobeAcademy::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'country_id' => json_encode($request->country_id),
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Aerobe Academy created successfully!');
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
    public function edit(Request $request, AerobeAcademy $aerobeAcademy)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.aerobe-academies.edit', compact('aerobeAcademy', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AerobeAcademy $aerobeAcademy)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'slug.required' => 'The slug field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
        ]);
        if(empty($aerobeAcademy->image))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ], [
                'image.required' => 'An image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
                'image.max' => 'Image size must not exceed 5MB.',
            ]);
        }

        if ($request->hasFile('image')) {
            // Delete old file
            if ($aerobeAcademy->image && file_exists(public_path('assets/uploads/aerobe-academies/' . $aerobeAcademy->image))) {
                unlink(public_path('assets/uploads/aerobe-academies/' . $aerobeAcademy->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/aerobe-academies/'), $imageName);
            $aerobeAcademy->image = $imageName;
        }


        $aerobeAcademy->title = $request->title;
        $aerobeAcademy->slug = $request->slug;
        $aerobeAcademy->category_id = $request->category_id;
        $aerobeAcademy->country_id = $request->country_id;
        $aerobeAcademy->short_description = $request->short_description;
        $aerobeAcademy->long_description = $request->long_description;
        $aerobeAcademy->status = $request->status;
       
        $aerobeAcademy->save();

        return redirect()->back()->with('success', 'Aerobe Academy updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AerobeAcademy $aerobeAcademy)
    {
        $delete = $aerobeAcademy->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Aerobe Academy Deleted Successfully!";
            
        }else{
            $message = "Aerobe Academy Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
