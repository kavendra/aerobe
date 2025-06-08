<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\OurPortfolio;

class DownloadController extends Controller
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

            // Handle AJAX Request (For Grid.js, DataTables, etc.)
            $downloads = Download::select(
                'downloads.id',
                'downloads.label',
                'downloads.status',
                'our_portfolios.title as title' // example additional field from join
            )
            ->join('our_portfolios', 'our_portfolios.id', '=', 'downloads.product_id')
            ->get();
            return response()->json($downloads, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.downloads.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ourPortfolios  = OurPortfolio::where('status', 1)->get();
        return view('admin.downloads.create', compact('ourPortfolios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'product_id' => 'required',
            'file' => 'required|mimes:pdf|max:5000',
        ], [
            'label.required' => 'The title field is required.',
            'product_id.required' => 'Please select a product.',
            'file.required' => 'A file is required.',
            'file.mimes' => 'The file must be a PDF.',
            'file.max' => 'The file size must not exceed 5MB.',
        ]);

       if ($request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()); // remove spaces

            $destinationPath = public_path('assets/uploads/downloads/');

            // Create the directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move file to destination
            $file->move($destinationPath, $fileName);

            // Optionally save the filename to the database or return it
            // e.g., $model->file = $fileName;
        }

        $download = Download::create([
            'label' => $request->label,
            'product_id' => $request->product_id,
            'pdf' => $fileName,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Top Menu created successfully!');
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
    public function edit(Request $request, Download $download)
    {
        $ourPortfolios  = OurPortfolio::where('status', 1)->get();
        return view('admin.downloads.edit', compact('download', 'ourPortfolios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'product_id' => 'required',
            'status' => 'required',

        ]);

        if(empty($download->pdf))
        {
            $request->validate([
                'file' => 'required|mimes:pdf|max:5000',
            ], [
                'file.required' => 'A file is required.',
                'file.mimes' => 'The file must be a PDF.',
                'file.max' => 'The file size must not exceed 5MB.',
            ]);
        }

        if ($request->hasFile('file')) {

            if ($download->pdf && file_exists(public_path('assets/uploads/downloads/' . $download->pdf))) {
                unlink(public_path('assets/uploads/downloads/' . $download->pdf));
            }


            $file = $request->file('file');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()); // remove spaces

            $destinationPath = public_path('assets/uploads/downloads/');

            // Create the directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move file to destination
            $file->move($destinationPath, $fileName);

            // Optionally save the filename to the database or return it
            $download->pdf = $fileName;
        }


        $download->label = $request->label;
        $download->product_id = $request->product_id;
        $download->status = $request->status;
        $download->save();

        return redirect()->back()->with('success', 'Download updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        $delete = $download->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Top Menu Deleted Successfully!";
            
        }else{
            $message = "Top Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
