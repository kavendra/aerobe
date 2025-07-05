<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsAndEvent;
use App\Models\NewsCategory;
use App\Models\Tag;
use App\Models\Country;
use App\Models\OurPortfolio;

class NewsAndEventController extends Controller
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
            $newsAndEvent = NewsAndEvent::leftJoin("countries", "news_events.country_id", "=", "countries.id")
                                            ->select(
                                                'news_events.id',
                                                'news_events.title',
                                                'news_events.image',
                                                //'countries.label AS country_name',
                                                'news_events.status'
                                            )
                                            ->get();

            return response()->json($newsAndEvent, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }


        // Handle normal page load
        return view('admin.news-events.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newsCategories = NewsCategory::where('status', 1)->get();
        $ourPortfolios = OurPortfolio::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.news-events.create', compact('newsCategories', 'tags', 'countries', 'ourPortfolios'));
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
            'event_date' => 'required',
            'tag_id' => 'required',
        ], [
            'title.required' => 'The title field is required.',
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
            'event_date.required' => 'The event date field is required.',
            'tag_id.required' => 'Please select anyone tag.',
        ]);
        $mainImg = "";
        if ($request->hasFile('main_img')) {
            $file = $request->file('main_img');
            $mainImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $mainImg);
        }
        
        $thumbImg = "";
        if ($request->hasFile('thumb_img')) {
            $file = $request->file('thumb_img');
            $thumbImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $thumbImg);
        }
        
        $is_main = ($request->is_main == 'on') ? 1 : 0;
        $is_home = ($request->is_home == 'on') ? 1 : 0;

        $newsAndEvent = NewsAndEvent::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'event_date' => $request->event_date,
            'main_img' => $mainImg,
            'thumb_img' => $thumbImg,
            'country_id' => $request->country_id,
            'is_main' => $is_main,
            'is_home' => $is_home,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'link' => $request->link,
            'product_id' => $request->product_id,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'News & Event created successfully!');
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
    public function edit(Request $request, NewsAndEvent $newsAndEvent)
    {
        $ourPortfolios = OurPortfolio::where('status', 1)->get();
        $newsCategories = NewsCategory::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        return view('admin.news-events.edit', compact('newsAndEvent', 'newsCategories', 'tags', 'countries', 'ourPortfolios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsAndEvent $newsAndEvent)
    {
        //dd($request->all());
       $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
            'event_date' => 'required',
            'tag_id' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'category_id.required' => 'Please select a category.',
            'country_id.required' => 'Please select at least one country.',
            'short_description.required' => 'Short description is required.',
            'event_date.required' => 'The event date field is required.',
            'tag_id.required' => 'Please select anyone tag.',
        ]);

        if(empty($newsAndEvent->main_img))
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
        
        if(empty($newsAndEvent->thumb_img))
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
            if ($newsAndEvent->main_img && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->main_img))) {
                unlink(public_path('assets/uploads/news-events/' . $newsAndEvent->main_img));
            }

            // Upload new file
            $file = $request->file('main_img');
            $mainImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $mainImg);
            $newsAndEvent->main_img = $mainImg;
        }
        
        
        if ($request->hasFile('thumb_img')) {
            // Delete old file
            if ($newsAndEvent->thumb_img && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->thumb_img))) {
                unlink(public_path('assets/uploads/news-events/' . $newsAndEvent->thumb_img));
            }

            // Upload new file
            $file = $request->file('thumb_img');
            $thumbImg = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $thumbImg);
            $newsAndEvent->thumb_img = $thumbImg;
        }
        
        $is_main = ($request->is_main == 'on') ? 1 : 0;
        $is_home = ($request->is_home == 'on') ? 1 : 0;

        $newsAndEvent->title = $request->title;
        $newsAndEvent->slug = $request->slug;
        $newsAndEvent->link = $request->link;
        $newsAndEvent->product_id = $request->product_id;
        $newsAndEvent->category_id = $request->category_id;
        $newsAndEvent->tag_id = $request->tag_id;
        $newsAndEvent->event_date = $request->event_date;
        $newsAndEvent->country_id = $request->country_id;
        $newsAndEvent->is_main = $is_main;
        $newsAndEvent->is_home = $is_home;
        $newsAndEvent->short_description = $request->short_description;
        $newsAndEvent->long_description = $request->long_description;
        $newsAndEvent->status = $request->status;

        
        $newsAndEvent->save();

        return redirect()->back()->with('success', 'News & Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAndEvent $newsAndEvent)
    {
        $delete = $newsAndEvent->delete();
        if($delete == 1) {
            $success = 1;
            $message = "News & Event Deleted Successfully!";
            
        }else{
            $message = "News & Event not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
