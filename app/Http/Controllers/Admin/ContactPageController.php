<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactPage;
 
class ContactPageController extends Controller
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
    public function edit(ContactPage $contactPage)
    { 
        return view('admin.cms-pages.edit_contact',compact('contactPage'));
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
    public function update(Request $request, ContactPage $contactPage)
    {
        // $request->validate([
        //     'glb_call_us_today' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        //     'glb_tech_support_email' => 'required|email',
        //     'glb_chat_with_us_email' => 'required|email',
        //     'glb_enquiry_email' => 'required|email',
        //     'glb_company_name' => 'required|string|max:255',
        //     'glb_company_address' => 'nullable|string|max:1000',

        //     'sg_call_us_today' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        //     'sg_tech_support_email' => 'required|email',
        //     'sg_chat_with_us_email' => 'required|email',
        //     'sg_enquiry_email' => 'required|email',
        //     'sg_company_name' => 'required|string|max:255',
        //     'sg_company_address' => 'nullable|string|max:1000',


        //     'au_call_us_today' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        //     'au_tech_support_email' => 'required|email',
        //     'au_chat_with_us_email' => 'required|email',
        //     'au_enquiry_email' => 'required|email',
        //     'au_company_name' => 'required|string|max:255',
        //     'au_company_address' => 'nullable|string|max:1000',


        //     'in_call_us_today' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        //     'in_tech_support_email' => 'required|email',
        //     'in_chat_with_us_email' => 'required|email',
        //     'in_enquiry_email' => 'required|email',
        //     'in_company_name' => 'required|string|max:255',
        //     'in_company_address' => 'nullable|string|max:1000',


        //     'my_call_us_today' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        //     'my_tech_support_email' => 'required|email',
        //     'my_chat_with_us_email' => 'required|email',
        //     'my_enquiry_email' => 'required|email',
        //     'my_company_name' => 'required|string|max:255',
        //     'my_company_address' => 'nullable|string|max:1000',

        //     'meta_title' => 'nullable|string|max:255',
        //     'meta_description' => 'nullable|string|max:1000',
        //     'meta_keywords' => 'nullable|string|max:500',
        //     // Add other fields as per your form...
        // ]);
        
        

        $contactPage->glb_call_us_today = $request->glb_call_us_today;
        $contactPage->glb_tech_support_email = $request->glb_tech_support_email;
        $contactPage->glb_chat_with_us_email = $request->glb_chat_with_us_email;
        $contactPage->glb_enquiry_email = $request->glb_enquiry_email;
        $contactPage->glb_company_name = $request->glb_company_name;
        $contactPage->glb_company_address = $request->glb_company_address;

        $contactPage->sg_call_us_today = $request->sg_call_us_today;
        $contactPage->sg_tech_support_email = $request->sg_tech_support_email;
        $contactPage->sg_chat_with_us_email = $request->sg_chat_with_us_email;
        $contactPage->sg_enquiry_email = $request->sg_enquiry_email;
        $contactPage->sg_company_name = $request->sg_company_name;
        $contactPage->sg_company_address = $request->sg_company_address;

        $contactPage->au_call_us_today = $request->au_call_us_today;
        $contactPage->au_tech_support_email = $request->au_tech_support_email;
        $contactPage->au_chat_with_us_email = $request->au_chat_with_us_email;
        $contactPage->au_enquiry_email = $request->au_enquiry_email;
        $contactPage->au_company_name = $request->au_company_name;
        $contactPage->au_company_address = $request->au_company_address;

        $contactPage->in_call_us_today = $request->in_call_us_today;
        $contactPage->in_tech_support_email = $request->in_tech_support_email;
        $contactPage->in_chat_with_us_email = $request->in_chat_with_us_email;
        $contactPage->in_enquiry_email = $request->in_enquiry_email;
        $contactPage->in_company_name = $request->in_company_name;
        $contactPage->in_company_address = $request->in_company_address;

        $contactPage->my_call_us_today = $request->my_call_us_today;
        $contactPage->my_tech_support_email = $request->my_tech_support_email;
        $contactPage->my_chat_with_us_email = $request->my_chat_with_us_email;
        $contactPage->my_enquiry_email = $request->my_enquiry_email;
        $contactPage->my_company_name = $request->my_company_name;
        $contactPage->my_company_address = $request->my_company_address;

        $contactPage->meta_title = $request->meta_title;
        $contactPage->meta_description = $request->meta_description;
        $contactPage->meta_keywords = $request->meta_keywords;
        
       
      
        $contactPage->save();
        return redirect()->route('admin.contact-page.edit', $contactPage->id)->with('success', 'Contact Us Page updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
