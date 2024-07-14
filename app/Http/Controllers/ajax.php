<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ajax extends Controller
{
    public function data_ajax(Request $request){
        
       //  return  $request->sections_id;

      $products= DB::table('products')->where("section_id",$request->sections_id)->pluck('product_name',"id");
      return json_encode($products);
       }
}
