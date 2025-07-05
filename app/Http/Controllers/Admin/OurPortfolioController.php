<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurPortfolio;
use App\Models\Category;
use App\Models\Country;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class OurPortfolioController extends Controller
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
            $our_portfolios = OurPortfolio::leftJoin('categories', 'categories.id', '=', 'our_portfolios.category_id')
                                            ->select(
                                                'our_portfolios.id',
                                                'our_portfolios.title',
                                                'our_portfolios.image',
                                                'categories.label',
                                                'our_portfolios.status'
                                            )
                                            ->get();

            return response()->json($our_portfolios, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.our-portfolios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.our-portfolios.create', compact('categories', 'countries'));
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
             'main_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
             'thumb_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ], [
            'title.required' => 'The title field is required.',
            'slug.required' => 'The slug field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
             'main_img.required' => 'Main Image is required.',
            'main_img.image' => 'The Main Image must be an image.',
            'main_img.mimes' => 'Main Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'main_img.max' => 'Main Image size must not exceed 5MB.',
            'thumb_img.required' => 'Thumb Image is required.',
            'thumb_img.image' => 'The Thumb Image must be an image.',
            'thumb_img.mimes' => 'Thumb Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'thumb_img.max' => 'Thumb Image size must not exceed 5MB.',
        ]);
        // if ($request->hasFile('image')) {

        //     // Upload new file
        //     $file = $request->file('image');
           
        //     $imageName = time().'_'.$file->getClientOriginalName();
        //     $file->move(public_path('assets/uploads/our-portfolios/'), $imageName);
       
        //     $width_1 = 640; $height_1 = 385;
        //     $width_2 = 1270; $height_2 = 535;
        //     $suffix_1 = "_{$width_1}x{$height_1}";
        //     $suffix_2 = "_{$width_2}x{$height_2}";

        //     // Upload new file
        //     #$file = $request->file('image');
        //     #$imageName = time().'_short_'.$file->getClientOriginalName();
        //     # dd($imageName);
        //     #$file->move(public_path('assets/uploads/our-portfolios/'), $imageName);
             
        //     # Image Resize
        //     $resizeImage_1 = replaceSize($imageName, $suffix_1);
        //     $resizeImage_2 = replaceSize($imageName, $suffix_2);
        //     $originalPath = public_path('assets/uploads/our-portfolios/'.$imageName);
        //     $resizedPath_1 = public_path('assets/uploads/our-portfolios/'.$resizeImage_1);
        //     $resizedPath_2 = public_path('assets/uploads/our-portfolios/'.$resizeImage_2);
            
        //     $imagine = new Imagine();
        //     $image = $imagine->open($originalPath);
        //     $image->resize(new Box($width_1, $height_1))->save($resizedPath_1);
        //     $image->resize(new Box($width_2, $height_2))->save($resizedPath_2);
        // }
        
         $mainImg = "";
        if ($request->hasFile('main_img')) {
            $file = $request->file('main_img');
            $mainImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/our-portfolios/'), $mainImg);
        }
        
        $thumbImg = "";
        if ($request->hasFile('thumb_img')) {
            $file = $request->file('thumb_img');
            $thumbImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/our-portfolios/'), $thumbImg);
        }


        $our_portfolios = OurPortfolio::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
             'main_img' => $mainImg,
            'thumb_img' => $thumbImg,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status,
            'read_more' => $request->read_more
        ]);

        return redirect()->back()->with('success', 'Portfolio created successfully!');
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
    public function edit(Request $request, OurPortfolio $ourPortfolio)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.our-portfolios.edit', compact('ourPortfolio', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurPortfolio $ourPortfolio)
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
        // if(empty($ourPortfolio->image))
        // {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        //     ], [
        //         'image.required' => 'An image is required.',
        //         'image.image' => 'The file must be an image.',
        //         'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
        //         'image.max' => 'Image size must not exceed 5MB.',
        //     ]);
        // }

        // if ($request->hasFile('image')) {
        //     $width_1 = 640; $height_1 = 385;
        //     $width_2 = 1270; $height_2 = 535;
        //     $suffix_1 = "_{$width_1}x{$height_1}";
        //     $suffix_2 = "_{$width_2}x{$height_2}";
          
        //     if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image))) {
        //         unlink(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image));
        //     }
            
        //     if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . replaceSize($ourPortfolio->image, $suffix_1)))) {
        //         unlink(public_path('assets/uploads/our-portfolios/' . replaceSize($ourPortfolio->image, $suffix_1)));
        //     }
            
        //     if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . replaceSize($ourPortfolio->image, $suffix_2)))) {
        //         unlink(public_path('assets/uploads/our-portfolios/' . replaceSize($ourPortfolio->image, $suffix_2)));
        //     }

        //     // Upload new file
        //     $file = $request->file('image');
        //     $imageName = time().'_'.$file->getClientOriginalName();
        //     $file->move(public_path('assets/uploads/our-portfolios/'), $imageName);
        //     $ourPortfolio->image = $imageName;
            
        //     # Image Resize
        //     $resizeImage_1 = replaceSize($imageName, $suffix_1);
        //     $resizeImage_2 = replaceSize($imageName, $suffix_2);
        //     $originalPath = public_path('assets/uploads/our-portfolios/'.$imageName);
        //     $resizedPath_1 = public_path('assets/uploads/our-portfolios/'.$resizeImage_1);
        //     $resizedPath_2 = public_path('assets/uploads/our-portfolios/'.$resizeImage_2);
            
        //     $imagine = new Imagine();
        //     $image = $imagine->open($originalPath);
        //     $image->resize(new Box($width_1, $height_1))->save($resizedPath_1);
        //     $image->resize(new Box($width_2, $height_2))->save($resizedPath_2);
        // }
        
        if(empty($ourPortfolio->main_img))
        {
            $request->validate([
                'main_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15000',
            ], [
                'main_img.required' => 'An Main Image is required.',
                'main_img.image' => 'The  Main Image must be an image.',
                'main_img.mimes' => ' Main Image must be a file of type: jpeg, png, jpg, gif, svg.',
                'main_img.max' => ' Main Image size must not exceed 5MB.',
            ]);
        }
        
        if(empty($ourPortfolio->thumb_img))
        {
            $request->validate([
                'thumb_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15000',
            ], [
                'thumb_img.required' => 'An Thumb Image is required.',
                'thumb_img.image' => 'The Thumb Image must be an image.',
                'thumb_img.mimes' => 'Thumb Image must be a file of type: jpeg, png, jpg, gif, svg.',
                'thumb_img.max' => 'Thumb Image size must not exceed 5MB.',
            ]);
        }


        if ($request->hasFile('main_img')) {
            // Delete old file
            if ($ourPortfolio->main_img && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->main_img))) {
                unlink(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->main_img));
            }

            // Upload new file
            $file = $request->file('main_img');
            $mainImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/our-portfolios/'), $mainImg);
            $ourPortfolio->main_img = $mainImg;
        }
        
        
        if ($request->hasFile('thumb_img')) {
            // Delete old file
            if ($ourPortfolio->thumb_img && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->thumb_img))) {
                unlink(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->thumb_img));
            }

            // Upload new file
            $file = $request->file('thumb_img');
            $thumbImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/our-portfolios/'), $thumbImg);
            $ourPortfolio->thumb_img = $thumbImg;
        }

        $ourPortfolio->title = $request->title;
        $ourPortfolio->slug = $request->slug;
        $ourPortfolio->category_id = $request->category_id;
        $ourPortfolio->country_id = $request->country_id;
        $ourPortfolio->short_description = $request->short_description;
        $ourPortfolio->long_description = $request->long_description;
        $ourPortfolio->status = $request->status;
        $ourPortfolio->read_more = $request->read_more;
       
        $ourPortfolio->save();

        return redirect()->back()->with('success', 'Portfolio updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPortfolio $ourPortfolio)
    {
        $delete = $ourPortfolio->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Portfolio Deleted Successfully!";
            
        }else{
            $message = "Portfolio Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
    
    public function reorder(Request $request)
    {
        foreach ($request->order as $item) {
            OurPortfolio::where('id', $item['id'])
                ->update(['order' => $item['position']]);
        }
    
        return response()->json(['status' => 'success']);
    }
}
