<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\Category;
use App\Models\Country;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
class SolutionController extends Controller
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
            $solutions = Solution::leftJoin('categories', 'categories.id', '=', 'solutions.category_id')
                                            ->select(
                                                'solutions.id',
                                                'solutions.title',
                                                'solutions.image',
                                                'categories.label',
                                                'solutions.status'
                                            )
                                            ->get();

            return response()->json($solutions, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.solutions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.solutions.create', compact('categories', 'countries'));
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
            $width_1 = 640; $height_1 = 385;
            $width_2 = 1170; $height_2 = 396;
            $suffix_1 = "_{$width_1}x{$height_1}";
            $suffix_2 = "_{$width_2}x{$height_2}";
    
            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/solutions/'), $imageName);
           
            # Image Resize
            $resizeImage_1 = replaceSize($imageName, $suffix_1);
            $resizeImage_2 = replaceSize($imageName, $suffix_2);
            $originalPath = public_path('assets/uploads/solutions/'.$imageName);
            $resizedPath_1 = public_path('assets/uploads/solutions/'.$resizeImage_1);
            $resizedPath_2 = public_path('assets/uploads/solutions/'.$resizeImage_2);
            
            $imagine = new Imagine();
            $image = $imagine->open($originalPath);
            $image->resize(new Box($width_1, $height_1))->save($resizedPath_1);
            $image->resize(new Box($width_2, $height_2))->save($resizedPath_2);
            
         
        }

        $our_portfolios = Solution::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Solutions created successfully!');
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
    public function edit(Request $request, Solution $solution)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.solutions.edit', compact('solution', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solution $solution)
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
        if(empty($solution->image))
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
            $width_1 = 640; $height_1 = 385;
            $width_2 = 1170; $height_2 = 396;
            $suffix_1 = "_{$width_1}x{$height_1}";
            $suffix_2 = "_{$width_2}x{$height_2}";
            
            if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . $solution->image))) {
                unlink(public_path('assets/uploads/solutions/' . $solution->image));
            }
            
            if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . replaceSize($solution->image, $suffix_1)))) {
                unlink(public_path('assets/uploads/solutions/' . replaceSize($solution->image, $suffix_1)));
            }
            
            if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . replaceSize($solution->image, $suffix_2)))) {
                unlink(public_path('assets/uploads/solutions/' . replaceSize($solution->image, $suffix_2)));
            }


            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/solutions/'), $imageName);
            $solution->image = $imageName;
            
            # Image Resize
            $resizeImage_1 = replaceSize($imageName, $suffix_1);
            $resizeImage_2 = replaceSize($imageName, $suffix_2);
            $originalPath = public_path('assets/uploads/solutions/'.$imageName);
            $resizedPath_1 = public_path('assets/uploads/solutions/'.$resizeImage_1);
            $resizedPath_2 = public_path('assets/uploads/solutions/'.$resizeImage_2);
            
            $imagine = new Imagine();
            $image = $imagine->open($originalPath);
            $image->resize(new Box($width_1, $height_1))->save($resizedPath_1);
            $image->resize(new Box($width_2, $height_2))->save($resizedPath_2);
        }


        $solution->title = $request->title;
        $solution->slug = $request->slug;
        $solution->category_id = $request->category_id;
        $solution->country_id = $request->country_id;
        $solution->short_description = $request->short_description;
        $solution->long_description = $request->long_description;
        $solution->status = $request->status;
       
        $solution->save();

        return redirect()->back()->with('success', 'Solution updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solution $solutions)
    {
        $delete = $solutions->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Solution Deleted Successfully!";
            
        }else{
            $message = "Solution Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
