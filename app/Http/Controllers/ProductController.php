<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Core\Number;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->get();
        return view('admin.product.list', compact('data'));
    }

    public function get_product(Request $request)
    {
        // dd($request->id);
        $data = Product::find($request->id);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'purchase_price' => 'required',
            'mrp' => 'required',
        ]);
        Product::create($validatedData);
        session()->flash('success', 'Product Has Been Created !!');
        return redirect()->route('product.index');
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
    public function edit(string $id)
    {
        $edit = Product::find($id);
        return view('admin.product.index', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'purchase_price' => 'required',
            'mrp' => 'required',
        ]);
        Product::find($id)->update($validatedData);
        session()->flash('success', 'Product Has Been Updated !!');
        return redirect()->route('product.index');
    }

    /*
     *
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Product::find($id)->delete();
        session()->flash('success', 'Product Has Been Deleted !!');
        return back();
    }
}
