<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicle::orderBy('id', 'desc')->get();
        return view('admin.vehicle.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vehicle.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',

        ]);
        Vehicle::create($validatedData);
        session()->flash('success', 'Vehicle Has Been Created !!');
        return redirect()->route('vehicle.index');
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
        $edit = Vehicle::find($id);
        return view('admin.vehicle.index', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        Vehicle::find($id)->update($validatedData);
        session()->flash('success', 'Vehicle Has Been Updated !!');
        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::find($id)->delete();
        session()->flash('success', 'Vehicle Has Been Deleted !!');
        return back();
    }
}
