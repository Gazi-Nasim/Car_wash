<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Saleproduct;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $employee = count(Employee::all());
        // dd($employee);
        $product = count(Product::all());
        $sale = count(Sale::all());
        $saleProduct = count(Saleproduct::all());
        $service = count(Service::all());
        $vehicle = count(Vehicle::all());

        $startDate = date('Y-m-1');
        $endDate = date('Y-m-d');
        $soldProduct = Saleproduct::whereBetween('created_at', [$startDate, $endDate])->get();
        $productPurchesPrice = 0;
        $soldPrice = 0;
        // $proID = [];
        foreach ($soldProduct as $soldPro) {
            $PurchesPrice = $soldPro->product_data->purchase_price;
            $productQuantity = $soldPro->quantity;
            $total = $PurchesPrice * $productQuantity;
            $productPurchesPrice = $productPurchesPrice + $total;
            $soldPrice = $soldPrice + $soldPro->price;
            // $proID[] = ($productPurchesPrice);
        };
        $proSalProfit = $soldPrice - $productPurchesPrice;

        $soldServiceData = Sale::whereBetween('invoice_date', [$startDate, $endDate])->whereNotNull('service_id')->get();
        $serviceProfit = 0;
        foreach ($soldServiceData as $serDta) {
            // dd($serDta->service_data->price);
            $serviceProfit += $serDta->service_data->price;
        }

        $costDatas = Expense::whereBetween('created_at', [$startDate, $endDate])->get();
        $TotlacostPrice = 0;
        foreach ($costDatas as $costData) {
            $TotlacostPrice += $costData->price;
        }
        $finalProfit = $proSalProfit + $serviceProfit - $TotlacostPrice;
        // dd($WashProfit);
        // dd($soldProductWithDate);
        return view('home', compact('proSalProfit', 'employee', 'product', 'sale', 'saleProduct', 'service', 'vehicle', 'serviceProfit', 'TotlacostPrice','finalProfit'));
    }
}
