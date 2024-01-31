<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    

    @include('admin.css')
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        
        <!-- partial -->
        @include('admin.body')

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>