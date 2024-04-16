<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expense::orderBy('id', 'desc')->get();
        return view('admin.expense.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.expense.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'date' => 'required',
        ]);
        Expense::create($validatedData);
        session()->flash('success', 'Expense Has Been Created !!');
        return redirect()->route('expense.index');
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
        $edit = Expense::find($id);
        return view('admin.expense.index', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'date' => 'required',
        ]);
        // dd($validatedData);
        Expense::find($id)->update($validatedData);
        session()->flash('success', 'Expense Has Been Updated !!');
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::find($id)->delete();
        session()->flash('success', 'Expense Has Been Deleted !!');
        return back();
    }
}
