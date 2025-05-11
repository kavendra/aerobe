<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Csr;
use App\Models\Category;
use App\Models\Tag;

class CsrController extends Controller
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
            $csrs = Csr::select('csrs.id', 'csrs.title', 'csrs.author_name', 'csrs.short_description','csrs.image', 'csrs.author_image', 'csrs.status')->get();

             return response()->json($csrs, 200, [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
        }


        // Handle normal page load
        return view('admin.csrs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.csrs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'author_name' => 'required',
            'event_date' => 'required',
            'tag_id' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Image size must not exceed 5MB.',
            'author_name.required' => 'The author name field is required.',
            'event_date.required' => 'The event date field is required.',
            'tag_id.required' => 'Please select anyone tag.',
        ]);
        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/csrs/'), $imageName);
        }

        if ($request->hasFile('author_image')) {

            // Upload new file
            $file = $request->file('author_image');
            $authorImage = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/csrs/'), $authorImage);
        }


        $csrs = Csr::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'tag_id' => json_encode($request->tag_id),
            'event_date' => $request->event_date,
            'image' => $imageName,
            'author_name' => $request->author_name,
            'author_image' => $authorImage,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Csr created successfully!');
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
    public function edit(Request $request, Csr $csr)
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.csrs.edit', compact('csr', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Csr $csr)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
            'author_name' => 'required',
            'event_date' => 'required',
            'tag_id' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
            'author_name.required' => 'The author name field is required.',
            'event_date.required' => 'The event date field is required.',
            'tag_id.required' => 'Please select anyone tag.',
        ]);

        if(empty($csr->image))
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
            if ($csr->image && file_exists(public_path('assets/uploads/csrs/' . $csr->image))) {
                unlink(public_path('assets/uploads/csrs/' . $csr->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/csrs/'), $imageName);
            $csr->image = $imageName;
        }

        if ($request->hasFile('author_image')) {
            // Delete old file
            if ($csr->author_image && file_exists(public_path('assets/uploads/csrs/' . $csr->author_image))) {
                unlink(public_path('assets/uploads/csrs/' . $csr->author_image));
            }

            // Upload new file
            $file = $request->file('author_image');
            $authorImage = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/csrs/'), $authorImage);
            $csr->author_image = $authorImage;
        }

        $csr->title = $request->title;
        $csr->category_id = $request->category_id;
        $csr->tag_id = json_encode($request->tag_id);
        $csr->event_date = $request->event_date;
        $csr->author_name = $request->author_name;
        $csr->short_description = $request->short_description;
        $csr->long_description = $request->long_description;
        $csr->status = $request->status;
       
        $csr->save();

        return redirect()->back()->with('success', 'Csr updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Csr $csr)
    {
        $delete = $csr->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Csr Deleted Successfully!";
            
        }else{
            $message = "Csr not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
