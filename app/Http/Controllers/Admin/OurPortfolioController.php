<?php

namespace App\Http\Controllers\Admin;


use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurPortfolio;
use App\Models\Category;
use App\Models\Country;


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

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();

            // Define destination path
            $destinationPath = public_path('assets/uploads/our-portfolios/');

            // Create folder if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move(public_path('assets/uploads/our-portfolios/'), $imageName);

            // Resize and save image
            $resizedImage = Image::make($file)
                ->resize(222, 125, function ($constraint) {
                    $constraint->aspectRatio(); // Keep aspect ratio
                    $constraint->upsize();      // Don't upscale smaller images
                })
                ->save($destinationPath . $imageName);

              // Resize and save image
            $resizedImage = Image::make($file)
                ->resize(1170, 396, function ($constraint) {
                    $constraint->aspectRatio(); // Keep aspect ratio
                    $constraint->upsize();      // Don't upscale smaller images
                })
                ->save($destinationPath . $imageName);
        }

        $our_portfolios = OurPortfolio::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
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
        if(empty($ourPortfolio->image))
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

            // Delete old image if exists
            if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image))) {
                unlink(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image));
                // You may also want to unlink the thumb_* version if stored
                $oldThumb = public_path('assets/uploads/our-portfolios/thumb_' . $ourPortfolio->image);
                $oldMain  = public_path('assets/uploads/our-portfolios/main_' . $ourPortfolio->image);
                if (file_exists($oldThumb)) unlink($oldThumb);
                if (file_exists($oldMain)) unlink($oldMain);
            }

            $file = $request->file('image');
            $originalName = time() . '_' . $file->getClientOriginalName();

            // File names
            $originalImage = $originalName;
            $thumbImage = 'thumb_' . $originalName;
            $mainImage = 'main_' . $originalName;

            $destinationPath = public_path('assets/uploads/our-portfolios/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            //Save original file
            $file->move($destinationPath, $originalImage);

            //Resize and save thumbnail (222x125)
            Image::make($destinationPath . $originalImage)
                ->resize(222, 125, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($destinationPath . $thumbImage);

            //Resize and save main image (1170x396)
            Image::make($destinationPath . $originalImage)
                ->resize(1170, 396, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($destinationPath . $mainImage);

            // Save main image name in DB (can store all versions if needed)
            $ourPortfolio->image = $originalImage;
        }

        $ourPortfolio->title = $request->title;
        $ourPortfolio->slug = $request->slug;
        $ourPortfolio->category_id = $request->category_id;
        $ourPortfolio->country_id = $request->country_id;
        $ourPortfolio->short_description = $request->short_description;
        $ourPortfolio->long_description = $request->long_description;
        $ourPortfolio->status = $request->status;
       
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
}
