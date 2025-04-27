<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
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
            $testimonials = Testimonial::select('testimonials.id', 'testimonials.label', 'testimonials.image', 'testimonials.status')->get();

            return response()->json($testimonials, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }


        // Handle normal page load
        return view('admin.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/testimonials/'), $filename);
        }

        $testimonial = Testimonial::create([
            'label' => $request->label,
            'rating' => $request->rating,
            'image' => $filename,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Testimonial created successfully!');
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
    public function edit(Request $request, Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete old file
            if ($testimonial->image && file_exists(public_path('assets/uploads/testimonials/' . $testimonial->image))) {
                unlink(public_path('assets/uploads/testimonials/' . $testimonial->image));
            }

            // Upload new file
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/testimonials/'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->label = $request->label;
        $testimonial->rating = $request->rating;
        $testimonial->description = $request->description;
        $testimonial->status = $request->status;
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $delete = $testimonial->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Testimonial Deleted Successfully!";
            
        }else{
            $message = "Testimonial not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
