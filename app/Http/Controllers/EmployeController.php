<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::orderBy('id', 'desc')->get();
        return view('admin.employe.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employe.index');
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
        Employee::create($validatedData);
        session()->flash('success', 'Employee Has Been Created !!');
        return redirect()->route('employee.index');
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
        $edit = Employee::find($id);
        return view('admin.employe.index', compact('edit'));
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
        Employee::find($id)->update($validatedData);
        session()->flash('success', 'Employee Has Been Updated !!');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        session()->flash('success', 'Employee Has Been Deleted !!');
        return back();
    }
}
