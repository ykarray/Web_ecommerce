<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

use Stripe;
class HomeController extends Controller
{   



    public function index()
{ #get all the product data using Product model and send it to home view using compact
    $product=Product::paginate(10);
    return View('home.userpage',compact('product'));
}
    





        public function redirect()
{
    // Ensure the user is authenticated
    
        $usertype = Auth::user()->usertype; 
        if($usertype == '1'){


            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_customer=user::all()->count();
            $order = order::all();
            $total_revenue=0;
            $order_delivered=0;
            $order_processing=0;
            foreach($order as $item)
            {$total_revenue=$total_revenue + $item->price;
              if($item->delivery_status == 'Delivered' )
                { $order_delivered=$order_delivered+1; }
            else
            {$order_processing=$order_processing+1;}
        }

            return View('admin.home',compact('total_product','total_order','total_customer','total_revenue','order_delivered','order_processing'));}
        else{

           $product=Product::paginate(10);

           return View('home.userpage',compact('product'));}
         
        
    

}


       public function product_details($id)
{
    
    $product = product::find($id);
    
    return View('home.product_details',compact('product'));
}

 
public function add_cart(Request $request ,$id)
{

if(Auth::id())
{ $user=Auth::user();
  $product=product::find($id);
  $cart = new cart;
  $cart->name=$user->name;
  $cart->email=$user->email;
  $cart->phone=$user->phone;
  $cart->address=$user->address;
  $cart->user_id=$user->id;
  $cart->Product_title=$product->title;
  if($product->discount_price!=null)
  {
   $cart->price=$product->discount_price * $request->quantity;
  }
else
{
    $cart->price=$product->price * $request->quantity;

}
  
  $cart->image=$product->image;
  $cart->product_id=$product->id;
  $cart->quantity=$request->quantity;
  $cart->save();
  return redirect()->back();


}

else
{

    return redirect('login');
}

}


public function show_cart()

{if(Auth::id())
      { 

    $id=Auth::user()->id;
    $cart=cart::where('user_id','=',$id)->get();

return View('home.showcart',compact('cart'));

          }
else
{

    return redirect('login');
}



}


public function remove_cart($id)

{

$cart=cart::find($id);
$cart->delete();
return redirect()->back();

}

public function cash_order()

{
#to get the current user data 
$user=Auth::user();
$userid=$user->id;

// Find the data of user_id in the cart table equal to $userid
$data = Cart::where('user_id', '=', $userid)->get();

    foreach ($data as $item) {
        $order = new Order;

        // Assign values to the order object
        $order->name = $item->name;
        $order->email = $item->email;
        $order->phone = $item->phone;
        $order->address = $item->address;
        $order->user_id = $item->user_id;
        $order->product_title = $item->product_title;
        $order->price = $item->price;
        $order->quantity = $item->quantity;
        $order->image = $item->image;
        $order->product_id = $item->product_id;
        $order->payement_status = 'Cash on delivery';
        $order->delivery_status = 'Processing';

        // Save the order
        $order->save();
        $cart_id=$item->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }

    return redirect()->back()->with('message','We have received Your Order, we will connect with you soon!');



}




public function stripe($totalprice)

{

return View('home.stripe',compact('totalprice'));

}

public function stripePost(Request $request,$totalprice)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $totalprice *100 ,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for payement!" 

        ]);




$user=Auth::user();
$userid=$user->id;

// Find the data of user_id in the cart table equal to $userid
$data = Cart::where('user_id', '=', $userid)->get();

    foreach ($data as $item) {
        $order = new Order;

        // Assign values to the order object
        $order->name = $item->name;
        $order->email = $item->email;
        $order->phone = $item->phone;
        $order->address = $item->address;
        $order->user_id = $item->user_id;
        $order->product_title = $item->product_title;
        $order->price = $item->price;
        $order->quantity = $item->quantity;
        $order->image = $item->image;
        $order->product_id = $item->product_id;
        $order->payement_status = 'Paid';
        $order->delivery_status = 'processing';

        // Save the order
        $order->save();
        $cart_id=$item->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }        

      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }




public function products()

{
    $product=Product::paginate(10);
    return View('home.all_product',compact('product'));
}





}
