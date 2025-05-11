<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LegalInformationMenu;

class LegalInformationMenuController extends Controller
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
            $usersRoles = LegalInformationMenu::select('legal_information_menus.id', 'legal_information_menus.label', 'legal_information_menus.status')
                        ->get();

            return response()->json($usersRoles);
        }

        // Handle normal page load
        return view('admin.legal-information-menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.legal-information-menus.create');
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

        $legalInformationMenu = LegalInformationMenu::create([
            'label' => $request->label,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Legal Information Menu created successfully!');
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
    public function edit(Request $request, LegalInformationMenu $legalInformationMenu)
    {
        return view('admin.legal-information-menus.edit', compact('legalInformationMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LegalInformationMenu $legalInformationMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $legalInformationMenu->label = $request->label;
        $legalInformationMenu->link = $request->link;
        $legalInformationMenu->status = $request->status;
        $legalInformationMenu->save();

        return redirect()->back()->with('success', 'Legal Information Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LegalInformationMenu $legalInformationMenu)
    {
        $delete = $legalInformationMenu->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Legal Information Menu Deleted Successfully!";
            
        }else{
            $message = "Legal Information Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
