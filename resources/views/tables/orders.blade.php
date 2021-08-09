@extends('admin.adminpage')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">



@section('table')

<div style="text-align:right; padding: 20px;">
    <a class="btn btn-primary" style="background-color:#E22C87;" href="{{url('/tables/createOrders')}}"> Place an
        Order</i></a>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div style= "background-color:#F4D1E4;"class="card-header">
                    <h3  class="card-title">ORDERS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="editable" class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Customer Number</th>
                                <th>Pick Up Location</th>
                                <th>Drop Off Location</th>
                                <th>Order Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)

                        <tr class="text-center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order-> customer_name}}</td>
                            <td>{{ $order-> customer_number}}</td>
                            <td>{{ $order-> pickup_location}}</td>
                            <td>{{ $order-> dropoff_location}}</td>
                            <td>{{ $order-> order_amount}}</td>

                            @if ($order -> status =='Canceled' )
                            <td>
                                <div class="p-1 mb-2" style="background-color: gray; color:white;">
                                    {{$order -> status}}
                                </div>
                            </td>
                            @elseif ($order -> status =='Processed' )
                            <td>
                                <div class="p-1 mb-2" style="background-color: #663A8C; color:white;">
                                    {{$order -> status}}
                                </div>
                            </td>
                            @elseif ($order -> status =='Completed' )
                            <td>
                                <div class="p-1 mb-2" style="background-color: green;  color:white;">
                                    {{$order -> status}}
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="p-1 mb-2" style="background-color: #EDCF81; color:white;">
                                    {{$order -> status}}
                                </div>
                            </td>
                            @endif

                            <td>{{ $order-> created_at}}</td>
                            <td>{{ $order-> updated_at}}</td>

                            
                            <td style="width:10%;">
                                 <a style ="background-color:#420039;"class="btn btn-primary" href="{{url('/tables/details/'. $order->id)}}"> Details <i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="card-body">
                        {{$orders->links("pagination::bootstrap-4")}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection