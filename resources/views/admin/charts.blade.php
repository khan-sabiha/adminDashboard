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
@endsection