<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Saleproduct;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sale::orderBy('id', 'desc')->get();
        return view('admin.sale.list', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::get();
        $employees = Employee::get();
        $products = Product::get();
        return view('admin.sale.index', compact('services', 'employees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $saleData = $request->validate([
            'employee_id' => 'required',
            'price' => 'required',
            'invoice_date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $saleData['service_id'] = $request->service_id;
        if(isset($request->photo)){
            $image = Image::make($request->file('photo'));
            $imageName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $image->save(public_path('images/') . $imageName);
            $saleData['photo'] = $imageName;
        }
        
        $saleData['invoiceID'] = rand(10, 100);
        // dd($saleData);
        $sale = Sale::create($saleData);
        // $data['sale_id'] = $sale->id;
        if (isset($request->product_id)) {
            $setTime = count($request->product_id);
            for ($i = 0; $i < $setTime; $i++) {
                $productData = [
                    'sale_id' => $sale->id,
                    'product_id' => $request->product_id[$i],
                    'quantity' => $request->product_quantity[$i],
                    'price' => $request->product_total[$i],
                    'date' => $request->invoice_date,
                ];
                // dd($productData);
                Saleproduct::create($productData);
            };
        };

        session()->flash('success', 'Sale Has Been Created !!');
        return redirect()->route('sale.index');
        // return redirect()->back()->with('msg', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sale::find($id);
        if (!isset($sales->service_name)) {
            $servicess[] = "No service";
        } else {
            $servicess[] = $sales->service_name;
        };
        $salesProduct = Saleproduct::where('sale_id', $id)->get();
        // dd($salesProduct);
        return view('admin.sale.invoice', compact('sales', 'salesProduct', 'servicess'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::get();
        $employees = Employee::get();
        $products = Product::get();
        $edit = Sale::find($id);
        if (!isset($edit->service_name)) {
            $servicess[] = "No service";
        } else {
            $servicess[] = $edit->service_name;
        };
        $salesProduct = Saleproduct::where('sale_id', $id)->get();
        return view('admin.sale.index', compact('services', 'employees', 'products', 'edit', 'salesProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $saleData = $request->validate([
            'employee_id' => 'required',
            'price' => 'required',
            'invoice_date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $saleData['service_id'] = $request->service_id;
        if ($request->file('photo')) {
            $image = Image::make($request->file('photo'));
            $imageName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $image->save(public_path('images/') . $imageName);
            $saleData['photo'] = $imageName;
        }
        // dd($saleData);
        Sale::find($id)->update($saleData);

        
        // dd($request->all());
        if (isset($request->product_id)) {
            $setTime = count($request->product_id);
            SaleProduct::where('sale_id', $id)->delete();
            for ($i = 0; $i < $setTime; $i++) {
                $productData = [
                    'sale_id' => $id,
                    'product_id' => $request->product_id[$i],
                    'quantity' => $request->product_quantity[$i],
                    'price' => $request->product_total[$i],
                ];
                // dd($productData);
                Saleproduct::create($productData);
            };
        };
        session()->flash('success', 'Sale Has Been Updated !!');
        return redirect()->route('sale.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sale::find($id)->delete();
        session()->flash('success', 'Sale Has Been Deleted !!');
        return back();
    }
}
