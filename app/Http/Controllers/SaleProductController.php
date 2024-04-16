<?php

namespace App\Http\Controllers;

use App\Models\Saleproduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Saleproduct::orderBy('id', 'desc')->get();
        return view('admin.saleproduct.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.saleproduct.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Saleproduct::create($validatedData);
        session()->flash('success', 'Sold Product Has Been Created !!');
        return redirect()->route('saleproduct.index');
        // return redirect()->back()->with('msg', 'Saved Successfully');
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
        $edit = Saleproduct::find($id);
        return view('admin.saleproduct.index', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Saleproduct::find($id)->update($validatedData);
        session()->flash('success', 'Sold Product Has Been Updated !!');
        return redirect()->route('saleproduct.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Saleproduct::find($id)->delete();
        session()->flash('success', 'Sold Product Has Been Deleted !!');
        return back();
    }
}
