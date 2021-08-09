@extends('admin.adminpage')


<!-- DataTables -->
<link rel="stylesheet" href="{{asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@section('products')

<div style="text-align:right; padding: 20px;">
    <a class="btn btn-primary" style="background-color:#E22C87;" href="{{url('/products/createProducts')}}"> Add
        Product</i></a>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div style="background-color:#F4D1E4;" class="card-header">
                    <h3 class="card-title">Products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bproducted table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Categories</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td>{{ $product-> p_name}}</td>
                            <td> <img src="{{asset('../images/' . $product->img)}}"></td>
                            <td>{{ $product-> p_descript}}</td>
                            <td>{{ $product-> categories}}</td>
                            <td>{{ $product-> price }}</td>
                            <td>{{ $product-> quantity}}</td>
                            <td>{{ $product-> status}}</td>
                            <td>
                                <div class="btn-group-vertical">
                                    <a class="btn btn-info " href="{{url('/products/editProducts/'. $product->id)}}"><i
                                            class="fas fa-edit">
                                        </i></a>
                                    <a class="btn btn-danger" href="{{url('/products/main/delete/'. $product->id)}}">
                                        <i class="fas fa-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                     {{$products->links("pagination::bootstrap-4")}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
