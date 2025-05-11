<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsResourceMenu;

class ProductsResourceMenuController extends Controller
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
            $productsResourceMenu = ProductsResourceMenu::select('products_resource_menus.id', 'products_resource_menus.label', 'products_resource_menus.status')
                        ->get();

            return response()->json($productsResourceMenu, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.products-resources-menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products-resources-menus.create');
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

        $productsResourceMenu = ProductsResourceMenu::create([
            'label' => $request->label,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Products Resource Menu created successfully!');
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
    public function edit(Request $request, ProductsResourceMenu $productsResourceMenu)
    {
        return view('admin.products-resources-menus.edit', compact('productsResourceMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductsResourceMenu $productsResourceMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required',
            'status' => 'required',
        ]);

        $productsResourceMenu->label = $request->label;
        $productsResourceMenu->link = $request->link;
        $productsResourceMenu->status = $request->status;
        $productsResourceMenu->save();

        return redirect()->back()->with('success', 'Products Resource Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductsResourceMenu $productsResourceMenu)
    {
        $delete = $productsResourceMenu->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Products Resource Menu Deleted Successfully!";
            
        }else{
            $message = "Products Resource Menu not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
