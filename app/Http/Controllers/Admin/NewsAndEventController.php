<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsAndEvent;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Country;

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
                                                'countries.label AS country_name',
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
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('admin.news-events.create', compact('categories', 'tags', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'author_name' => 'required',
            'event_date' => 'required',
            'tag_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $imageName);
        }

        if ($request->hasFile('author_image')) {

            // Upload new file
            $file = $request->file('author_image');
            $authorImage = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $authorImage);
        }

        $newsAndEvent = NewsAndEvent::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'event_date' => $request->event_date,
            'image' => $imageName,
            'author_name' => $request->author_name,
            'author_image' => $authorImage,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
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
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        return view('admin.news-events.edit', compact('newsAndEvent', 'categories', 'tags', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsAndEvent $newsAndEvent)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'author_name' => 'required',
            'event_date' => 'required',
            'tag_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete old file
            if ($newsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->image))) {
                unlink(public_path('assets/uploads/news-events/' . $newsAndEvent->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $imageName);
            $newsAndEvent->image = $imageName;
        }

        if ($request->hasFile('author_image')) {
            // Delete old file
            if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image))) {
                unlink(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image));
            }

            // Upload new file
            $file = $request->file('author_image');
            $authorImage = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/news-events/'), $authorImage);
            $newsAndEvent->author_image = $authorImage;
        }

        $newsAndEvent->title = $request->title;
        $newsAndEvent->category_id = $request->category_id;
        $newsAndEvent->tag_id = $request->tag_id;
        $newsAndEvent->event_date = $request->event_date;
        $newsAndEvent->author_name = $request->author_name;
        $newsAndEvent->short_description = $request->short_description;
        $newsAndEvent->long_description = $request->long_description;
        $newsAndEvent->status = $request->status;

        //dd($newsAndEvent);
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
