@extends('admin.adminpage')
@section('customers')

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header" style="background-color:#E22C87;">
                    <h3 class="card-title">Edit Customer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="post" action="{{url('customers/editCustomers/'. $customers->id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name"
                                value="{{$customers->name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Customer Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="+966" name="phone"
                                value="{{$customers->phone}}" pattern="^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"
                                value="{{$customers->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password"
                                name="password" value="{{$customers->password}}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button style="background-color:#E22C87;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection