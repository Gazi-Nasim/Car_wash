<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { return view('login'); })->name('/');

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
})->name('loginFRM');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'users'], function () {
        Route::resource('users', UserController::class)->names('user');
    });

    Route::group(['prefix' => 'employee'], function () {
        Route::resource('employee', EmployeController::class)->names('employee');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::post('get_product', [ProductController::class, 'get_product'])->name('get_product');
        Route::resource('product', ProductController::class)->names('product');
    });

    Route::group(['prefix' => 'sale'], function () {
        Route::resource('sale', SaleController::class)->names('sale');
    });

    Route::group(['prefix' => 'saleproduct'], function () {
        Route::resource('saleproduct', SaleProductController::class)->names('saleproduct');
    });

    Route::group(['prefix' => 'service'], function () {
        Route::post('get_service', [ServiceController::class, 'get_service'])->name('get_service');
        Route::resource('service', ServiceController::class)->names('service');
    });

    Route::group(['prefix' => 'vehicle'], function () {
        Route::resource('vehicle', VehicleController::class)->names('vehicle');
    });

    Route::group(['prefix' => 'expense'], function () {
        Route::resource('expense', ExpenseController::class)->names('expense');
    });

    Route::group(['prefix' => 'income_Expense'], function () {
        Route::get('product-summery', [IncomeExpenseController::class, 'product_summery'])->name('product.summery');
        Route::get('product-income', [IncomeExpenseController::class, 'product_income'])->name('product.income');
        Route::get('{date}/product-datewise', [IncomeExpenseController::class, 'product_dateWise'])->name('product.dateWise');
        Route::get('wash-summery', [IncomeExpenseController::class, 'wash_summery'])->name('wash.summery');
        Route::get('{date}/wash-datewise', [IncomeExpenseController::class, 'wash_dateWise'])->name('wash.dateWise');
        Route::get('wash-income', [IncomeExpenseController::class, 'wash_income'])->name('wash.income');
        Route::get('expense_summery/{date?}', [IncomeExpenseController::class, 'expense_summery'])->name('expense.summery');
        Route::get('{date}/expense-datewise', [IncomeExpenseController::class, 'expense_dateWise'])->name('expense.dateWise');
    });
});
