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
    public function update(Request $request, Websetting $webSetting)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'pininterest_url' => 'nullable|url',
            'footer_shortdesc' => 'required|string',
            'opening_hours' => 'required|string',
            'copyright_text' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);

        if ($request->hasFile('header_image')) {
            // Delete old file
            if ($webSetting->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $webSetting->header_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $webSetting->header_image));
            }

            // Upload new file
            $file = $request->file('header_image');
            $header_image = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $header_image);
            $webSetting->header_image = $header_image;
        }

        if ($request->hasFile('about_image')) {
            // Delete old file
            if ($webSetting->about_image && file_exists(public_path('assets/uploads/cms-pages/' . $webSetting->about_image))) {
                unlink(public_path('assets/uploads/cms-pages/' . $webSetting->about_image));
            }

            // Upload new file
            $file = $request->file('about_image');
            $about_image = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/cms-pages/'), $about_image);
            $webSetting->about_image = $about_image;
        }

        $webSetting->header_heading = $request->header_heading;
        $webSetting->header_title = $request->header_title;
        $webSetting->instagram_url = $request->instagram_url;
        $webSetting->twitter_url = $request->twitter_url;
        $webSetting->youtube_url = $request->youtube_url;
        $webSetting->linkedin_url = $request->linkedin_url;
        $webSetting->instagram_url = $request->instagram_url;
        $webSetting->pininterest_url = $request->pininterest_url;
        $webSetting->footer_shortdesc = $request->footer_shortdesc;
        $webSetting->copyright_text = $request->copyright_text;
        $webSetting->opening_hours = $request->opening_hours;
        $webSetting->customers_in_countries = $request->customers_in_countries;
        $webSetting->offices_in_countries = $request->offices_in_countries;

        $webSetting->meta_title = $request->meta_title;
        $webSetting->meta_description = $request->meta_description;
        $webSetting->meta_keywords = $request->meta_keywords;

        $webSetting->from_name = $request->from_name;
        $webSetting->from_email = $request->from_email;
        $webSetting->to_name = $request->to_name;
        $webSetting->to_email = $request->to_email;
        $webSetting->mail_mailer = $request->mail_mailer;
        $webSetting->mail_host = $request->mail_host;
        $webSetting->mail_port = $request->mail_port;
        $webSetting->mail_username = $request->mail_username;
        $webSetting->mail_password = $request->mail_password;
        $webSetting->mail_encryption = $request->mail_encryption;

        $webSetting->save();

        return redirect()->route('admin.web-setting.edit', $webSetting->id)->with('success', 'Website settings updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
