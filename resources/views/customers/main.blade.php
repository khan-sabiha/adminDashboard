@extends('admin.adminpage')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('customers')
<div style="text-align:right; padding: 20px;">
    <a class="btn btn-primary" style="background-color:#E22C87;" href="{{ url('/customers/createCustomers') }}"> Add
        Customers</a>
</div>

<div class="container">
    <div class="row">
        @foreach($customers as $customer)
        <div class="col-md-3 mb-4">
            <div class="our-team">
                <div class="picture">
                    <img class="img-fluid" src="{{ asset('../assets/img/profile.png') }}">
                </div>
                <div class="team-content">
                    <h5 class="name">{{ $customer->name }}</h5>
                    <p class="email">{{ $customer->email }}</p>
                    <p class="email">{{ $customer->phone }}</p>
                </div>
                <ul class="social">
                    <li><a href="{{ url('customers/editCustomers/'. $customer->id) }}" class="small-box-footer"><i
                                class="fas fa-edit"></i></a></li>
                    <li><a class="small-box-footer" href="{{ url('customers/main/delete/'. $customer->id) }}"><i
                                class="fas fa-trash"></i></a></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ $customers->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>


<style>
body {
    font-family: tahoma;
    height: 100vh;
    background-size: cover;
    display: flex;
}

.our-team {
    padding: 30px 0 40px;
    margin-bottom: 20px;
    background-color: #FFFFFF;
    text-align: center;
    overflow: hidden;
    position: relative;
}

.our-team .picture {
    display: inline-block;
    height: 100px;
    width: 100px;
    margin-bottom: 50px;
    z-index: 1;
    position: relative;
}

.our-team .picture::before {
    content: "";
    width: 100%;
    height: 0;
    border-radius: 50%;
    background-color: #F4D1E4;
    position: absolute;
    bottom: 135%;
    right: 0;
    left: 0;
    opacity: 0.9;
    transform: scale(3);
    transition: all 0.3s linear 0s;
}

.our-team:hover .picture::before {
    height: 100%;
}

.our-team .picture::after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #F4D1E4;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.our-team .picture img {
    width: 100%;
    height: auto;
    border-radius: 50%;
    transform: scale(1);
    transition: all 0.9s ease 0s;
}

.our-team:hover .picture img {
    box-shadow: 0 0 0 14px #FFFFFF;
    transform: scale(0.7);
}

.our-team .title {
    display: block;
    font-size: 15px;
    color: #4e5052;
    text-transform: capitalize;
}

.our-team .social {
    width: 100%;
    padding: 0;
    margin: 0;
    background-color: #F4D1E4;
    position: absolute;
    bottom: -100px;
    left: 0;
    transition: all 0.5s ease 0s;
}

.our-team:hover .social {
    bottom: 0;
}

.our-team .social li {
    display: inline-block;
}

.our-team .social li a {
    display: block;
    padding: 10px;
    font-size: 17px;
    color: white;
    transition: all 0.3s ease 0s;
    text-decoration: none;
}

.our-team .social li a:hover {
    color: #F4D1E4;
    background-color: #FFFFFF;
}
</style>
@endsection