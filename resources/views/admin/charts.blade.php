@extends('admin.adminpage')
@section('order-chart')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total }}</h3>
                Total Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-box"></i>
                <!-- <i class="fas"><img src="{{asset('../assets/img/totalOrders-icon.png')}}" style="width:30%; height:40%; float: right;"></i> -->
            </div>
            <a href="/tables/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"> </i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $completed }}<sup style="font-size: 20px"></sup></h3>

                <p>Completed Orders</p>
            </div>
            <div class="icon">
                <i class="fa fa-check-square"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $pending }}</h3>

                <p>Pending Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $canceled }}</h3>

                <p>Canceled Orders</p>
            </div>
            <div class="icon">
                <i class="far fa-window-close"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
</div>
<!-- /.row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card card-primary">
                    <div style=" background-color:#E22C87; "  class="card-header">
                        <h3 class="card-title">Sales</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('../plugins/chart.js/Chart.min.js')}}"></script>

<script>
    $(function() {
        var months = {!! json_encode($months) !!}
        var data = {!! json_encode($dataset) !!}
        var months_name = {!! json_encode($months_name) !!}
        // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        // var areaChartData = {
        //     labels: months_name,
        //     datasets: [{
        //             label: 'Sales',
        //             backgroundColor: 'rgba(60,141,188,0.9)',
        //             borderColor: 'rgba(60,141,188,0.8)',
        //             pointRadius: false,
        //             pointColor: '#3b8bba',
        //             pointStrokeColor: 'rgba(60,141,188,1)',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(60,141,188,1)',
        //             data: data
        //         },
        //         {
        //             label: 'Electronics',
        //             backgroundColor: 'rgba(210, 214, 222, 1)',
        //             borderColor: 'rgba(210, 214, 222, 1)',
        //             pointRadius: false,
        //             pointColor: 'rgba(210, 214, 222, 1)',
        //             pointStrokeColor: '#c1c7d1',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(220,220,220,1)',
        //             data: data
        //         },
        //     ]
        // }

        // var areaChartOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        //     legend: {
        //         display: false
        //     },
        //     scales: {
        //         xAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }],
        //         yAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }]
        //     }
        // }

        // //This will get the first returned node in the jQuery collection.
        // new Chart(areaChartCanvas, {
        //     type: 'line',
        //     data: areaChartData,
        //     options: areaChartOptions
        // })

        // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        // var lineChartOptions = $.extend(true, {}, areaChartOptions)
        // var lineChartData = $.extend(true, {}, areaChartData)
        // lineChartData.datasets[0].fill = false;
        // lineChartData.datasets[1].fill = false;
        // lineChartOptions.datasetFill = false

        // var lineChart = new Chart(lineChartCanvas, {
        //     type: 'line',
        //     data: lineChartData,
        //     options: lineChartOptions
        // })




        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: months_name,
            datasets: [{
                data: data,
                backgroundColor: [ '#F4D1E4','#420039', '#F2F3AE', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

});
</script>