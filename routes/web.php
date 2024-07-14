<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ajax;
use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\invoiceArchive;
use App\Http\Controllers\InvoicesAttechmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\InvoicesReportController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionsController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(InvoicesController::class)->group(function(){
 Route::get('Invoices/index','index')->name('Invlices/index');
 Route::get('Invoices/create','create')->name('Invoices/create');
 Route::post('Invoices/store','store')->name('Invoices/store');
 Route::get('Invoices/edit/{id}','edit')->name('Invoices/edit');
 Route::post('Invoices/update','update')->name('Invoices/update');
 Route::post('Invoices/destroy','destroy')->name('Invoices/destroy');
 Route::get('Invoices/show/{id}','show')->name('Invoices/show');
 Route::post('Invoices/Status_Update/{id}','Status_Update')->name('Invoices/Status_Update');

 Route::get('Invoices/Invoice_Paid','Invoice_Paid')->name('Invoices/Invoice_Paid');
 Route::get('Invoices/Invoice_unPaid','Invoice_unPaid')->name('Invoices/Invoice_UnPaid');
 Route::get('Invoices/Invoice_Partial','Invoice_Partial')->name('Invoices/Invoice_Partial');
 Route::get('Invoices/Print_invoice/{id}','Print_invoice')->name('Invoices/Print_invoice');


});
Route::controller(SectionsController::class)->group(function(){
 Route::get('Sections/index','index')->name('Sections/index');
 Route::post('Sections/store','store')->name('Sections/store');
 Route::post('Sections/update','update')->name('Sections/update');
 Route::post('Sections/destroy','destroy')->name('Sections/destroy');

});
Route::controller(ProductsController::class)->group(function(){
 Route::get('Products/index','index')->name('Products/index');
 Route::post('Products/store','store')->name('Products/store');
 Route::post('Products/update','update')->name('Products/update');
 Route::post('Products/destroy','destroy')->name('Products/destroy');

});
Route::controller(ajax::class)->group(function(){
    Route::post('I','data_ajax')->name('data/data_ajax');
});
Route::controller(InvoicesDetailsController::class)->group(function(){
    Route::get('InvoicesDetails/index/{id}','index')->name('InvoicesDetails/index');
    Route::get('InvoicesDetails/open_file/{invoice_number}/{file_name}','open_file')->name('InvoicesDetails/open_file');
    Route::get('InvoicesDetails/get_file/{invoice_number}/{file_name}','get_file')->name('InvoicesDetails/get_file');
    Route::post('InvoicesDetails/destroy','destroy')->name('InvoicesDetails/destroy');
});
Route::controller(InvoicesAttechmentsController::class)->group(function(){
 Route::post('InvoicesAttechments/store','store')->name('InvoicesAttechments/store');


});

Route::controller(invoiceArchive::class)->group(function(){

    Route::get('invoiceArchive/index','index')->name('invoiceArchive/index');
    Route::post('invoiceArchive/update','update')->name('invoiceArchive/update');
    Route::post('invoiceArchive/delete','delete')->name('invoiceArchive/delete');


});


Route::controller(InvoicesReportController::class)->group(function(){

    Route::get('InvoicesReport/index','index')->name('InvoicesReport/index');
    Route::post('InvoicesReport/Search_invoices','Search_invoices')->name('InvoicesReport/Search_invoices');

});

Route::controller(CustomerReportController::class)->group(function(){

    Route::get('CustomerReport/index','index')->name('CustomerReport/index');
    Route::post('CustomerReport/Search_customers','Search_customers')->name('CustomerReport/Search_customers');

});



Route::controller(AdminController::class)->group(function (){
   Route::get('index','index')->name('index');
});

Route::controller(\App\Http\Controllers\HomeController::class)->group(function (){
    Route::get('index','index')->name('index');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

