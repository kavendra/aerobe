<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KnowledgeHub;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tag;

class KnowledgeHubController extends Controller
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
            $knowledge_hubs = KnowledgeHub::select('knowledge_hubs.id', 'knowledge_hubs.title', 'knowledge_hubs.short_description','knowledge_hubs.image', 'knowledge_hubs.status')->get();

            return response()->json($knowledge_hubs, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }


        // Handle normal page load
        return view('admin.knowledge-hubs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.knowledge-hubs.create', compact('categories', 'tags', 'countries'));
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
            $file->move(public_path('assets/uploads/knowledge-hubs/'), $imageName);
        }
        $is_main = ($request->is_main == 'on') ? 1 : 0;
        $knowledge_hubs = KnowledgeHub::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'is_main' => $is_main,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Knowledge Hub created successfully!');
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
    public function edit(Request $request, KnowledgeHub $knowledgeHub)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.knowledge-hubs.edit', compact('knowledgeHub', 'categories', 'tags', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KnowledgeHub $knowledgeHub)
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
        if(empty($knowledgeHub->image))
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
            if ($knowledgeHub->image && file_exists(public_path('assets/uploads/knowledge-hubs/' . $knowledgeHub->image))) {
                unlink(public_path('assets/uploads/knowledge-hubs/' . $knowledgeHub->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/knowledge-hubs/'), $imageName);
            $knowledgeHub->image = $imageName;
        }
        $is_main = ($request->is_main == 'on') ? 1 : 0;

        $knowledgeHub->title = $request->title;
        $knowledgeHub->slug = $request->slug;
        $knowledgeHub->category_id = $request->category_id;
        $knowledgeHub->is_main = $is_main;
        $knowledgeHub->short_description = $request->short_description;
        $knowledgeHub->long_description = $request->long_description;
        $knowledgeHub->status = $request->status;
       
        $knowledgeHub->save();

        return redirect()->back()->with('success', 'Knowledge Hub updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KnowledgeHub $knowledgeHub)
    {
        $delete = $knowledgeHub->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Knowledge Hub Deleted Successfully!";
            
        }else{
            $message = "Knowledge Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
