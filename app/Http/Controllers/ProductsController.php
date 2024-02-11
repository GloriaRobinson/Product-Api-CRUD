<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    //
    public function add(Request $request)
    {
      $items=new Products();
      $items->name=$request->name;
      $items->value=$request->value;
      $items->quantity=$request->quantity;

      $items->save();
      return response()->json ('Product Added Successfully');
    }
    public function edit(Request $request)
    {
      $items=Products::findorfail($request->id);
      $items->name=$request->name;
      $items->value=$request->value;
      $items->quantity=$request->quantity;

      $items->save();
      return response()->json ('Product Updated Successfully');
    }

    public function delete(Request $request)
    {
      $items = Products::findorfail($request->id)->delete();
  
      return response()->json ('Product Deleted Successfully');
    }
    public function getData()
    {
      $items = Products::all();
  
      return response()->json ($items);
    }
}
