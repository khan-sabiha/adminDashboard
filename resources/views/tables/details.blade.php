@extends('admin.adminpage')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">



@section('table')
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-10">
            <div style="background-color:#F4D1E4;" class="d-flex justify-content-center" id="order-heading">
                <div class="card-header">
                    <h3 class="title">ORDER DETAILS</h3>
                </div>
            </div>
            <div class="card-body wrapper bg-white">
                <div class="table-responsive">
                    <table id="editable" class="table table-borerless table-hover">
                        <thead>
                            <tr class="text-uppercase text-muted">
                                <th scope="col">Order ID</th>
                                <th scope="col">total</th>
                                <th scope="col"> Product Name</th>
                                <th scope="col"> Product Quantity</th>
                                <th scope="col"> Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">{{$orders->id}}</td>
                                <td scope="row">{{$orders->order_amount}}</td>
                                <td scope="row">{{ $products->p_name}}</td>
                                <td scope="row">{{ $op->quantity }}</td>
                                <td scope="row">{{$orders->order_descript}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row border rounded p-1 my-3">
                    <div class="col-md-6 py-3">
                        <div class="d-flex flex-column align-items start"> <b>Pick Up Location</b>
                            <p class="text-justify pt-2">{{$orders->pickup_location}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 py-3">
                        <div class="d-flex flex-column align-items start"> <b>Drop Off Location</b>
                            <p class="text-justify pt-2">{{ $orders->dropoff_location}}</p>
                        </div>
                    </div>
                </div>
                <div class="row pl-3 font-weight-bold h4">Status</div>
                <div class="row border rounded p-1 my-3">
                    <div style="padding-top: 20px; padding-bottom:20px;" class="container ">

                        <!-- Progress-->
                        <div class="steps">
                            @if ($orders -> status =='Canceled' )
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar text-uppercase" role="progressbar"
                                    style="width: 100%; background-color:gray ;" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"><b> {{ $orders->status }} </b></div>
                            </div>
                            @endif
                            @if ($orders -> status =='Pending' )
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar bg-warning text-uppercase" role="progressbar"
                                    style="width: 30%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><b>
                                        {{ $orders->status }} </b></div>
                            </div>
                            @endif
                            @if ($orders -> status =='Completed' )
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar text-uppercase" role="progressbar"
                                    style="width: 100%; background-color:green;" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"><b> {{ $orders->status }} </b></div>
                            </div>
                            @endif
                            @if ($orders -> status =='Processed' )
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar text-uppercase" role="progressbar"
                                    style="width: 70%; background-color: #663A8C;" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"><b> {{ $orders->status }} </b></div>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">

                    <form method="post" action="{{url('/tables/details/' . $orders->id)}}" role="form"
                        class="form-inline">
                        @csrf
                        <div class="form-group mx-sm-2 mb-2">
                            <select style=" border-color:#420039;" class="custom-select" name="status" required="">
                                <option value=""> Select </option>
                                <option value="Pending">Pending</option>
                                <option value="Processed">Processed</option>
                                <option value="Canceled">Canceled</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <button style="border-color:#420039; background-color:#420039;  " type="submit"
                            class="btn btn-primary sm-2 mb-2">Update</button>
                    </form>
                    <div style='text-align:right;'>
                        <a class="btn btn-danger font-weight-bold"
                            href="{{url('/tables/details/delete/'. $orders->id)}}">
                            DELETE <i class="fas fa-trash"></i></a>
                        <a class="btn btn-info font-weight-bold " href="{{url('/tables/editOrders/'. $orders->id)}}">
                            EDIT
                            <i class="fas fa-edit"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
<style>
body {
    margin-top: 20px;
}

.steps {
    border: 1px solid #e7e7e7
}

.steps-header {
    padding: .375rem;
    border-bottom: 1px solid #e7e7e7
}

.steps-header .progress {
    height: .25rem
}

.steps-body {
    display: table;
    table-layout: fixed;
    width: 100%
}

.step {
    display: table-cell;
    position: relative;
    padding: 1rem .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-right: 1px dashed #dfdfdf;
    color: rgba(0, 0, 0, 0.65);
    font-weight: 600;
    text-align: center;
    text-decoration: none
}

.step:last-child {
    border-right: 0
}

.step-indicator {
    display: block;
    position: absolute;
    top: .75rem;
    left: .75rem;
    width: 1.5rem;
    height: 1.5rem;
    border: 1px solid #e7e7e7;
    border-radius: 50%;
    background-color: #fff;
    font-size: .875rem;
    line-height: 1.375rem
}

.has-indicator {
    padding-right: 1.5rem;
    padding-left: 2.375rem
}

.has-indicator .step-indicator {
    top: 50%;
    margin-top: -.75rem
}

.step-icon {
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    margin: 0 auto;
    margin-bottom: .75rem;
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    color: #888
}

.step:hover {
    color: rgba(0, 0, 0, 0.9);
    text-decoration: none
}

.step:hover .step-indicator {
    -webkit-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    border-color: transparent;
    background-color: #f4f4f4
}

.step:hover .step-icon {
    color: rgba(0, 0, 0, 0.9)
}

.step-active,
.step-active:hover {
    color: rgba(0, 0, 0, 0.9);
    pointer-events: none;
    cursor: default
}

.step-active .step-indicator,
.step-active:hover .step-indicator {
    border-color: transparent;
    background-color: #5c77fc;
    color: #fff
}

.step-active .step-icon,
.step-active:hover .step-icon {
    color: #5c77fc
}

.step-completed .step-indicator,
.step-completed:hover .step-indicator {
    border-color: transparent;
    background-color: rgba(51, 203, 129, 0.12);
    color: #33cb81;
    line-height: 1.25rem
}

.step-completed .step-indicator .feather,
.step-completed:hover .step-indicator .feather {
    width: .875rem;
    height: .875rem
}

@media (max-width: 575.98px) {
    .steps-header {
        display: none
    }

    .steps-body,
    .step {
        display: block
    }

    .step {
        border-right: 0;
        border-bottom: 1px dashed #e7e7e7
    }

    .step:last-child {
        border-bottom: 0
    }

    .has-indicator {
        padding: 1rem .75rem
    }

    .has-indicator .step-indicator {
        display: inline-block;
        position: static;
        margin: 0;
        margin-right: 0.75rem
    }
}

.bg-secondary {
    background-color: #f7f7f7 !important;
}
</style>