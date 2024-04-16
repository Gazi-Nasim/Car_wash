<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Sale;
use App\Models\Saleproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeExpenseController extends Controller
{
    public function product_income(Request $request)
    {
        $title = 'Monthly';
        if (!isset($request->startDate)) {
            $startDate = date('Y-m-01');
            $currentDate = date('Y-m-d');
            $IncreaseOneDay = strtotime($currentDate . '+1 day');
            $endDate = date('Y-m-d', $IncreaseOneDay);
            $soldProductWithDate = Saleproduct::whereBetween('created_at', [$startDate, $endDate])->get();
        } else {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $soldProductWithDate = Saleproduct::whereBetween('created_at', [$startDate, $endDate])->get();
            $ProductData = [];
            foreach ($soldProductWithDate as $soldPdt) {
                $data['name'] = $soldPdt->product_data->name ?? '';
                $data['purchase_price'] = $soldPdt->product_data->purchase_price ?? '';
                $data['sale_price'] = $soldPdt->price ?? '';
                $data['mrp'] = $soldPdt->product_data->mrp ?? '';
                $data['quantity'] = $soldPdt->quantity ?? '';
                $data['profit'] = $soldPdt->product_data->mrp - $soldPdt->product_data->purchase_price ?? '';
                $data['pD_id'] = $soldPdt->product_id ?? '';
                $data['created_at'] = $soldPdt->created_at ?? '';
                $ProductData[] = $data;
            }
            return response()->json($ProductData);
        };
        // dd($finalProu);
        return view('admin.incomeExpense.income_report', compact('soldProductWithDate', 'title'));
    }

    public function product_summery(Request $request)
    {
        $title = "Product";
        $route = 'product';
        if (!isset($request->startDate)) {
            $startDate = date('Y-m-01');
            $currentDate = date('Y-m-d');
            $IncreaseOneDay = strtotime($currentDate . '+1 day');
            $endDate = date('Y-m-d', $IncreaseOneDay);

            $soldProductWithDate = Saleproduct::whereBetween('date', [$startDate, $endDate])
                ->groupBy('date')->get();
            // dd($soldProductWithDate);
            $datePriceData = [];
            foreach ($soldProductWithDate as $soldData) {
                $price = Saleproduct::where('date', $soldData->date)->sum('price');
                $data['price'] = $price;
                $data['date'] = $soldData->date;
                $datePriceData[] = $data;
            };
            // dd($datePriceData);
        } else {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $soldProductWithDate = Saleproduct::whereBetween('date', [$startDate, $endDate])
                ->groupBy('date')->get();
            $datePriceData = [];
            foreach ($soldProductWithDate as $soldData) {
                $price = Saleproduct::where('date', $soldData->date)->sum('price');
                $data['price'] = $price;
                $data['date'] = $soldData->date;
                $datePriceData[] = $data;
            };
            // dd($datePriceData);
            // return response()->json($datePriceData);
        };
        // dd($finalProu);
        return view('admin.incomeExpense.summery', compact('datePriceData', 'title', 'route'));
    }

    public function product_dateWise($date)
    {
        $title = 'Date Wise';
        $soldProductWithDate = Saleproduct::where('date', $date)->get();
        return view('admin.incomeExpense.income_report', compact('soldProductWithDate', 'title'));
        // dd($soldProductWithDate);
    }

    public function wash_income(Request $request)
    {
        if (!isset($request->startDate)) {
            $startDate = date('Y-m-01');
            $currentDate = date('Y-m-d');
            $IncreaseOneDay = strtotime($currentDate . '+1 day');
            $endDate = date('Y-m-d', $IncreaseOneDay);
            $soldProductWithDate = Sale::whereBetween('invoice_date', [$startDate, $endDate])->get();
            // dd($soldProductWithDate);
            $ServiceDatas = [];
            foreach ($soldProductWithDate as $serData) {
                // dd($serData->created_at);
                if ($serData->service_id !== null) {
                    $data['name'] = $serData->service_data->name;
                    $data['charge'] = $serData->service_data->price;
                    $data['invoice_date'] = $serData->invoice_date;
                    $ServiceDatas[] = $data;
                }
            }
            // dd($ServiceDatas);
        } else {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            // dd($startDate);
            $soldProductWithDate = Sale::whereBetween('invoice_date', [$startDate, $endDate])->get();
            $ServiceDatas = [];
            foreach ($soldProductWithDate as $serData) {
                // dd($serData->created_at);
                if ($serData->service_id !== null) {
                    $data['name'] = $serData->service_data->name;
                    $data['charge'] = $serData->service_data->price;
                    $data['invoice_date'] = $serData->invoice_date;
                    $data['pD_id'] = $serData->service_id;
                    $ServiceDatas[] = $data;
                }
            }
            // dd($ProductData);
            return response()->json($ServiceDatas);
        };

        return view('admin.incomeExpense.wash_report', compact('ServiceDatas'));
    }

    public function wash_summery(Request $request)
    {
        $title = "Wash";
        $route = 'wash';
        if (!isset($request->startDate)) {
            $startDate = date('Y-m-01');
            $currentDate = date('Y-m-d');
            $IncreaseOneDay = strtotime($currentDate . '+1 day');
            $endDate = date('Y-m-d', $IncreaseOneDay);

            $soldServiceWithDate = Sale::whereBetween('invoice_date', [$startDate, $endDate])
                ->groupBy('invoice_date')->get();
            // dd($soldServiceWithDate);

            $datePriceData = [];
            foreach ($soldServiceWithDate as $soldData) {

                $dataDatePerALL = Sale::where('invoice_date', $soldData->invoice_date)
                    ->whereNotNull('service_id')
                    ->get();

                $time = count($dataDatePerALL);
                // dd($time);
                if ($time !== 0) {

                    $pric = 0;
                    foreach ($dataDatePerALL as $priecCal) {
                        $p = $priecCal->service_data->price;
                        $pric += $p;
                        $data['date'] = $priecCal->invoice_date;
                    }
                    $data['price'] = $pric;
                    $datePriceData[] = $data;
                };
            }

            // dd($costDatasVlu);
        } else {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $soldServiceWithDate = Sale::whereBetween('invoice_date', [$startDate, $endDate])
                ->groupBy('invoice_date')->get();

            $datePriceData = [];
            foreach ($soldServiceWithDate as $soldData) {
                $dataDatePerALL = Sale::where('invoice_date', $soldData->invoice_date)
                    ->whereNotNull('service_id')
                    ->get();
                $time = count($dataDatePerALL);
                // dd($time);
                if ($time !== 0) {

                    $pric = 0;
                    foreach ($dataDatePerALL as $priecCal) {
                        $p = $priecCal->service_data->price;
                        $pric += $p;
                        $data['date'] = $priecCal->invoice_date;
                    }
                    $data['price'] = $pric;
                    $datePriceData[] = $data;
                };
            }
            // dd($datePriceData);
            // return response()->json($datePriceData);
        };
        // dd($finalProu);
        return view('admin.incomeExpense.summery', compact('datePriceData', 'title', 'route',));
    }

    public function wash_dateWise($date)
    {

        $ServiceSale = Sale::where('invoice_date', $date)->get();
        // dd($ServiceDatas);
        $ServiceDatas = [];
        foreach ($ServiceSale as $serD) {
            // dd($serD);
            $data['name'] = $serD->service_data->name;
            $data['charge'] = $serD->service_data->price;
            $data['invoice_date'] = $serD->invoice_date;
            $ServiceDatas[] = $data;
        }
        return view('admin.incomeExpense.wash_report', compact('ServiceDatas'));
    }


    public function expense_summery(Request $request)
    {
        $title = "expense";
        $route = 'expense';
        if (!isset($request->startDate)) {
            $startDate = date('Y-m-01');
            $currentDate = date('Y-m-d');
            $IncreaseOneDay = strtotime($currentDate . '+1 day');
            $endDate = date('Y-m-d', $IncreaseOneDay);

            $ExpenseDatas = Expense::whereBetween('date', [$startDate, $endDate])
                ->groupBy('date')->get();;
            // dd($ExpenseDatas);

            $datePriceData = [];
            foreach ($ExpenseDatas as $soldData) {
                $price = Expense::where('date', $soldData->date)->sum('price');
                $data['price'] = $price;
                $data['date'] = $soldData->date;
                $datePriceData[] = $data;
            };
        } else {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $ExpenseDatas = Expense::whereBetween('date', [$startDate, $endDate])
                ->groupBy('date')->get();;
            // dd($ExpenseDatas);

            $datePriceData = [];
            foreach ($ExpenseDatas as $soldData) {
                $price = Expense::where('date', $soldData->date)->sum('price');
                // dd($soldData);
                $data['name'] = $soldData->name;
                $data['price'] = $price;
                $data['date'] = $soldData->date;
                $datePriceData[] = $data;
            };
            return response()->json($datePriceData);
        }
        return view('admin.incomeExpense.summery', compact('title', 'route', 'datePriceData'));
    }

    public function expense_dateWise($date)
    {
        $ServiceSale = Expense::where('date', $date)->get();
        // dd($ServiceDatas);
        $ServiceDatas = [];
        foreach ($ServiceSale as $serD) {
            // dd($serD);
            $data['name'] = $serD->name;
            $data['charge'] = $serD->price;
            $data['invoice_date'] = $serD->date;
            $ServiceDatas[] = $data;
        }
        return view('admin.incomeExpense.expense_report', compact('ServiceDatas'));
    }
}
