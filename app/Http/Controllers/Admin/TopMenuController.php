<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TopMenu;

class TopMenuController extends Controller
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
            $top_menus = TopMenu::select('top_menus.id', 'top_menus.label', 'top_menus.status')
                        ->get();

            return response()->json($top_menus, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.top-menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.top-menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $topMenu = TopMenu::create([
            'label' => $request->label,
            'link' => $request->link,
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
    public function edit(Request $request, TopMenu $topMenu)
    {
        return view('admin.top-menus.edit', compact('topMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopMenu $topMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $topMenu->label = $request->label;
        $topMenu->link = $request->link;
        $topMenu->status = $request->status;
        $topMenu->save();

        return redirect()->back()->with('success', 'Top Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopMenu $topMenu)
    {
        $delete = $topMenu->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Top Menu Deleted Successfully!";
            
        }else{
            $message = "Top Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
