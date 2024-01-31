<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
       public function view_catagory()
{
    

    $data=catagory::all();
    return View('admin.catagory',compact('data'));
}

      public function add_catagory(Request $request)
{
    
   $data = new catagory;
   $data->catagory_name= $request->catagory;
   $data->save();
   return redirect()->back()->with('message','catagory Added Successfully');

}
      public function delete_catagory($id)
{
    
   $data = catagory::find($id);
   $data->delete();
   return redirect()->back()->with('message','catagory Deleted Successfully');

}


public function view_product()
{
    

    $catagory = catagory::all();

    return View('admin.product',compact('catagory'));
}




 public function add_product(Request $request)
{#te5ou eli ketbou fil page request->description w thezou lel base de donnee product->description
  $product = new product;
   $product->title= $request->title;
   $product->description= $request->description;
   $product->price= $request->price;
   $product->quantity= $request->quantity;
   $product->discount_price= $request->dis_price;
   $product->catagory= $request->catagory;
   # les fichier 7ala 5assa 5ater lezmek tsavi fi blassa o5ra hna bech na3mlou e save fi fichier public/product
   $image=$request->image;
   $imagename=time().'.'.$image->getClientOriginalExtension();
   $request->image->move('product',$imagename);
   $product->image=$imagename;
   $product->save();
   return redirect()->back()->with('message','producted Added Successfully');
   

}
public function show_product()
{
    #nedi le data bech nhezha lel view 
$product = product::all();
    
return View('admin.show_product',compact('product'));
}
public function delete_product($id)
{
    
   $data = product::find($id);
   $data->delete();
   return redirect()->back()->with('message','product Deleted Successfully');

}

public function update_product($id)
{
    #nedi le data bech nhezha lel view 
    #hna 5dthina ken les donnees relative il product mo3ayan
    $product = product::find($id);
    #5dhina eliste des catagory bech ynejem ybedelle il catagory
    $catagory = catagory::all();
    #il compact tebath les donnees 
   return view("admin.update_product",compact('product','catagory'));

}


 public function update_product_confirm($id,Request $request)
{#te5ou eli ketbou fil page  w thezou lel base de donnee product->description
    #findind the product of a specific id
  $product = product::find($id);
   $product->title= $request->title;
   $product->description= $request->description;
   $product->price= $request->price;
   $product->quantity= $request->quantity;
   $product->discount_price= $request->dis_price;
   $product->catagory= $request->catagory;
   # les fichier 7ala 5assa 5ater lezmek tsavi fi blassa o5ra hna bech na3mlou e save fi fichier public/product
   $image=$request->image;
   if($image){
    $imagename=time().'.'.$image->getClientOriginalExtension();
   $request->image->move('product',$imagename);
   $product->image=$imagename;
   }
   
   $product->save();
   return redirect()->back()->with('message','producted Updated Successfully');
   

}



public function order()
{
    $order=order::all();
    return View('admin.order',compact('order'));

}



public function delivered($id)
{
    $order=order::find($id);
    $order->delivery_status="Delivered";
    $order->payement_status="Paid";
    $order->save();
    return redirect()->back();
   

}
public function search(Request $request)
{//$request->search ta3tike el donnée eli fil form win name==search
    $searchText =$request->search;
    $order=orders::where('name','LIKE',"%$searchText%")->get();
    return View('admin.order',compact('order'));
   

}

}

 

