<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prominent;
use App\Models\Country;

class ProminentController extends Controller
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
            $prominents = Prominent::select('prominents.id', 'prominents.label','prominents.logo', 'prominents.status')
                        ->get();

            return response()->json($prominents, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.prominents.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.prominents.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'country_id' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ], [
            'label.required' => 'The title field is required.',
            'country_id.required' => 'Please select anyone country.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Image size must not exceed 5MB.',
        ]);

        if ($request->hasFile('logo')) {

            // Upload new file
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/prominents/'), $filename);
        }

        $category = Prominent::create([
            'label' => $request->label,
            'link' => $request->link,
            'country_id' => $request->country_id,
            'logo' => $filename,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Prominent Customer created successfully!');
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
    public function edit(Request $request, Prominent $prominent)
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.prominents.edit', compact('prominent', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prominent $prominent)
    {
        $request->validate([
            'label' => 'required|string',
            'country_id' => 'required',
        ], [
            'label.required' => 'The title field is required.',
            'country_id.required' => 'Please select anyone country.',
        ]);

        if(empty($prominent->logo))
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
            if ($prominent->logo && file_exists(public_path('assets/uploads/prominents/' . $prominent->logo))) {
                unlink(public_path('assets/uploads/prominents/' . $prominent->logo));
            }

            // Upload new file
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/prominents/'), $filename);
            $prominent->logo = $filename;
        }

        $prominent->label = $request->label;
        $prominent->link = $request->link;
        $prominent->country_id = $request->country_id;
        $prominent->status = $request->status;
        $prominent->save();

        return redirect()->back()->with('success', 'Prominent Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prominent $prominent)
    {
        $delete = $prominent->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Prominent Customer Deleted Successfully!";
            
        }else{
            $message = "Prominent Customer not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
