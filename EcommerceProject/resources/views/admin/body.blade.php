<div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_product}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total products</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_order}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total orders</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_customer}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total customers</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_revenue}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                  </div>
                </div>
              </div>

<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$order_delivered}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order delivered</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$order_processing}}</h3>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order processing</h6>
                  </div>
                </div>
              </div>
 </div>



<div>
<div style="width:400px;height: 400px;border-radius: 10px; overflow: hidden;display: inline-block; " id="myDiv">
   <script type="text/javascript">
    var x = ["Delivered", "Processing"];
    var y = [{{$order_delivered}}, {{$order_processing}}];

    var data = [
        {
            labels: x,
            values: y,
            type: "pie",
            marker: { colors: ['rgba(55, 128, 191, 0.7)', 'rgba(219, 64, 82, 0.7)'] }
        }
    ];

    var layout = {
        title: "Delivery Status",
        showlegend: true,
        legend: {
            x: 1,
            y: 1.3,
            font: {
                family: 'Arial, sans-serif',
                size: 14,
                color: 'black',
            }
        }
    };

    Plotly.newPlot('myDiv', data, layout);
</script>


</div><div style="width:400px;height: 400px;border-radius: 10px; overflow: hidden;display: inline-block; margin-left: 40px;" id="myDiv1">
   <script type="text/javascript">
        var x = ["Total product", "Total order"];
        var y = [{{$total_product}}, {{$total_order}}];

        var data = [
            {
                x: x,
                y: y,
                type: "bar",
                marker: { color: ['rgba(124, 184, 95, 0.7)', 'rgba(255, 153, 51, 0.7)'] }
            }
        ];

        var layout = {
            title: "Total product vs Total order",
            xaxis: {
                title: 'Status',
                tickfont: {
                    size: 14,
                    color: 'rgb(107, 107, 107)'
                }
            },
            yaxis: {
                title: 'Count',
                tickfont: {
                    size: 14,
                    color: 'rgb(107, 107, 107)'
                }
            }
        };

        Plotly.newPlot('myDiv1', data, layout);
    </script>
    
</div>
                        
 </div>             
        














                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>