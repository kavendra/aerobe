<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutPage;
 
class AboutPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(AboutPage $aboutPage)
    { 
        return view('admin.cms-pages.edit_about',compact('aboutPage'));
    }

    public function doUpload($file,$directory,$request)
    {
        $path = public_path().'/' . $directory;
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
         }
        $file = $request->file($file);
        $fileName = uniqid() . trim($file->getClientOriginalName());
        $file->move($path,$fileName);
        return $fileName;
    }

    public function removeFile($directory,$files)
    {
        $file = public_path().'/'.$directory.'/'.$files;
        if(File::isFile($file)){
          File::delete($file);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutPage $aboutPage)
    {

        if ($request->hasFile('header_image')) {
            // Delete old file
            if ($aboutPage->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $aboutPage->header_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $aboutPage->header_image));
            }

            // Upload new file
            $file = $request->file('header_image');
            $header_image = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $header_image);
            $aboutPage->header_image = $header_image;
        }

        $aboutPage->header_title = $request->header_title;
        $aboutPage->header_desc = $request->header_desc;
        $aboutPage->about_desc = $request->about_desc;
     
        $aboutPage->meta_title = $request->meta_title;
        $aboutPage->meta_description = $request->meta_description;
        $aboutPage->meta_keywords = $request->meta_keywords;


        $aboutPage->save();

        return redirect()->route('admin.about-page.edit', $aboutPage->id)->with('success', 'About Us updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
