<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MainMenu;

class MainMenuController extends Controller
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
            $mainMenu = MainMenu::select('main_menus.id', 'main_menus.label', 'main_menus.status')
                        ->get();

            return response()->json($mainMenu, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.main-menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.main-menus.create');
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

        $mainMenu = MainMenu::create([
            'label' => $request->label,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Main Menu created successfully!');
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
    public function edit(Request $request, MainMenu $mainMenu)
    {
        return view('admin.main-menus.edit', compact('mainMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainMenu $mainMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $mainMenu->label = $request->label;
        $mainMenu->link = $request->link;
        $mainMenu->status = $request->status;
        $mainMenu->save();

        return redirect()->back()->with('success', 'Main Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainMenu $mainMenu)
    {
        $delete = $mainMenu->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Main Menu Deleted Successfully!";
            
        }else{
            $message = "Main Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
