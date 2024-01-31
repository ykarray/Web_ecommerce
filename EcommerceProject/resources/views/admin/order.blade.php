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
            <h1 class="title_deg">All Orders</h1>
            <div style="padding-left: 400px; padding-bottom: 30px;">
              
              <form action="{{'search'}}" method="get">
                @csrf
                <input type="text" name="search" placeholder="Search for something">
                <input type="submit" Value="Search" class="btn btn-outline-success">
              </form>
            </div>
            <table  class="table_deg">
              <tr class="th_deg">
                <th>Name</th>
                <th>Email</th>
             
                <th>Product title</th>
                <th>Quantity</th>
                <th>Price (TD)</th>
                <th>Payement Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Delivered</th>
                


              </tr>
              @foreach($order as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->product_title}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->payement_status}}</td>
                <td>{{$item->delivery_status}}</td>
                <td>
                  <img style="width: 190px ; height: 190px ; margin: auto;" src="/product/{{$item->image}}">
                </td>
                <td>
                  @if($item->delivery_status == 'processing')
                  <a href="{{url('delivered',$item->id)}}" onclick="return confirm('Are you sure this product is delivered ?')" class="btn btn-primary">Delivered</a>
                  @else()
                  <p style="color:green; font-size: bold; font-size: 15px;"> Delivered </p>
                  @endif




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