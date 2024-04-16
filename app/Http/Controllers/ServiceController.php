<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::orderBy('id', 'desc')->get();
        return view('admin.service.list', compact('data'));
    }

    public function get_service(Request $request)
    {

        $data = Service::find($request->id);
        // dd($data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Vehicle::get();
        return view('admin.service.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'vehicle_id' => 'required',
            'price' => 'required',
        ]);
        Service::create($validatedData);
        session()->flash('success', 'Service Has Been Created !!');
        return redirect()->route('service.index');
        
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
        $data = Vehicle::get();
        $edit = Service::find($id);
        return view('admin.service.index', compact('edit','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'vehicle_id' => 'required',
            'price' => 'required',
        ]);
        Service::find($id)->update($validatedData);
        session()->flash('success', 'Service Has Been Updated !!');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::find($id)->delete();
        session()->flash('success', 'Service Has Been Deleted !!');
        return back();
    }
}
