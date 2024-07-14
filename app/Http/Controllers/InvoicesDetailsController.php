<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\invoices_attechments;
use App\Models\invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // return $id;
        $invoices=invoices::where('id',$id)->first();
        $invoices_details=  invoices_details::where('id_Invoice',$id)->get();
        $invoices_attechments=invoices_attechments::where('invoice_id',$id)->get();
        $id=1;
      return view("invoices.details_invoices",compact('invoices_details',"invoices",'invoices_attechments','id'));
    }


    public function open_file($invoice_number,$file_name)
{
        $st="Attachments";
        $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
        return response()->file($pathToFile);
}
public function get_file($invoice_number,$file_name)
{
        $st="Attachments";
        $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
        return response()->download($pathToFile);
}


    public function destroy(Request $request)
    {
        $invoices = invoices_attechments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

}
