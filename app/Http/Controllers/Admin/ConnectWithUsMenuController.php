<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConnectWithUsMenu;

class ConnectWithUsMenuController extends Controller
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
            $connectWithUsMenu = ConnectWithUsMenu::select('connect_withus_menus.id', 'connect_withus_menus.label', 'connect_withus_menus.status')
                        ->get();

            return response()->json($connectWithUsMenu, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.connect-withus-menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.connect-withus-menus.create');
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

        $connectWithUsMenu = ConnectWithUsMenu::create([
            'label' => $request->label,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Connect With Us Menu created successfully!');
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
    public function edit(Request $request, ConnectWithUsMenu $connectWithUsMenu)
    {
        return view('admin.connect-withus-menus.edit', compact('connectWithUsMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConnectWithUsMenu $connectWithUsMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $connectWithUsMenu->label = $request->label;
        $connectWithUsMenu->link = $request->link;
        $connectWithUsMenu->status = $request->status;
        $connectWithUsMenu->save();

        return redirect()->back()->with('success', 'Connect With Us Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConnectWithUsMenu $connectWithUsMenu)
    {
        $delete = $connectWithUsMenu->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Connect With Us Menu Deleted Successfully!";
            
        }else{
            $message = "Connect With Us Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
