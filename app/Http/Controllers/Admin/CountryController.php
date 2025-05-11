<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
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
            $countries = Country::select('countries.id', 'countries.label', 'countries.code', 'countries.image', 'countries.status')
                        ->orderBy('order', 'ASC')
                        ->get();

            return response()->json($countries, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/countries/'), $filename);
        }

        $is_main = ($request->is_main == 'on') ? 1 : 0;

        $Country = Country::create([
            'label' => $request->label,
            'code' => $request->code,
            'is_main' => $is_main,
            'image' => $filename,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Country created successfully!');
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
    public function edit(Request $request, Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);


        if ($request->hasFile('image')) {
            // Delete old file
            if ($country->image && file_exists(public_path('assets/uploads/countries/' . $country->image))) {
                unlink(public_path('assets/uploads/countries/' . $country->image));
            }

            // Upload new file
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/countries/'), $filename);
            $country->image = $filename;
        }
        $is_main = ($request->is_main == 'on') ? 1 : 0;

        $country->code = $request->code;
        $country->is_main = $is_main;
        $country->label = $request->label;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with('success', 'Country updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $delete = $country->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Country Deleted Successfully!";
            
        }else{
            $message = "Country not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
