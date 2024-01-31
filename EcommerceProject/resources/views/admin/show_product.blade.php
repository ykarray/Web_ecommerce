<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">

    .title_deg {

      text-align: center;
      font-size: 25px;
      font-weight: bold;
      padding-bottom: 40px;
    }
      
    .table_deg
    {
      border-collapse:separate;
      border: 2px solid white;
      border-radius:8px;
      width: 100%;
      margin:auto;
      text-align: center;
      border-color: gray;


    }
     
     .th_deg{
      font-size: 17px;
      padding: 3px;
      background-color: gray;
    }
      

    </style>
    
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        
        <!-- partial -->
       <div class="main-panel">
          <div class="content-wrapper">
             <div class="content-wrapper">
            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>  
              {{session()->get('message')}}
            </div>


            @endif 
            <h1 class="title_deg">All Products</h1>
            <table class="table_deg">
              <tr class="th_deg">
                <th>Product title</th>
                
                <th>Quantity</th>
                <th>Catagory</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Product Image</th>
                <th>Action</th>
                
              </tr>
              @foreach($product as $product)
              <tr>
                <td>{{$product->title}}</td>
                
                <td>{{$product->quantity}}</td>
                <td>{{$product->catagory}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>
                  <img style="width: 200px ; height: 200px ; margin: auto;" src="/product/{{$product->image}}">
                </td>
                <td>
                  <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
                
                  <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edite</a>
                </td>
              </tr>

            @endforeach

            </table>
           

       </div>
     </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>