<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class invoiceArchive extends Controller
{
  public function index(){

   $invoices= invoices::onlyTrashed()->get();
   $id=0;
    return view('invoices.archive',compact('invoices','id'));
  }


  public function update(Request $request){
    // return $request->invoice_id;

    $id = $request->invoice_id;
    $flight = Invoices::withTrashed()->where('id', $id)->restore();
    session()->flash('restore_invoice');
    return redirect()->route('invoiceArchive/index');


  }

  public function delete(Request $request){
    // return $request->invoice_id;

    $id = $request->invoice_id;
    $flight = Invoices::withTrashed()->where('id', $id)->first();
    $flight->forceDelete();
    session()->flash('delete_invoice');
    return redirect()->route('invoiceArchive/index');


  }
}
