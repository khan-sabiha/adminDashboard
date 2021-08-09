@extends('admin.adminpage')

@section('table')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary" id="main-content">
                <div class="card-header" style="background-color:#E22C87;">
                    <h3 class="card-title">Place an Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="post" action="/tables/createOrders">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Customer Name</label>

                            <select type="text" class="form-control" id="name" name="name">
                                <option>----Select----</option>
                                <option value="Add guest Order"> Add Guest Order</option>
                                @foreach($customers as $customer)
                                <option id="optionName" value="{{ $customer->id}}"> {{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="customers_id" name="customers_id">
                        </div>
                        <div class="form-group">
                            <label for="number">Customer Number</label>
                            <select type="text" class="form-control" id="number" name="number">
                                <option>----Select----</option>
                                <option value="Add new number">Add new number</option>
                                @foreach($customers as $customer)
                                <option class="option" value="{{ $customer->phone }}"> {{ $customer->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="products"> Product </label>
                            <select type="text" class="form-control" id="products" name="products">
                                <option>----Select----</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}"> {{$product-> p_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="products_id" name="products_id">
                        </div>
                        <div class="form-group">
                            <label for="quant">Product Quantity </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                        data-type="minus" data-field="quant">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="quant" class="form-control input-number" value="1" min="1"
                                    max="100">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus"
                                        data-field="quant">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pickup">Pickup Location</label>
                            <input type="text" class="form-control" id="pickup" placeholder="Enter Pickup Location"
                                name="pickup">
                        </div>

                        <div class="form-group">
                            <label for="dropoff">Dropoff Location</label>
                            <input type="text" class="form-control" id="dropoff" placeholder="Enter Dropoff Location"
                                name="dropoff">
                        </div>
                        <div class="form-group">
                            <label for="descript">Order Description</label>
                            <input type="text" class="form-control" id="descript" placeholder="Enter Order Description"
                                name="descript">
                        </div>
                        <div class="form-group">
                            <label for="amount">Order Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Enter Order amount"
                                name="amount">
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button style="background-color:#E22C87;" type="submit" onclick="myFunction()"
                            class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

<script>
$(function() {

    $('#name').change(function() {
        if ($(this).val() == 'Add guest Order') {
            $('#name').replaceWith(
                '<input type="text" class="form-control" id="newInput" placeholder="Enter Full Name" name="name">'
            );
        } else {
            var option = $(this).find("option:selected").text();
            var optionValue = $(this).val();
            console.log(option);
            console.log(optionValue);
            $('#customers_id').replaceWith(
                '<input type="hidden" class="form-control" id="customers_id" name="customers_id" value="' +
                optionValue + '">'
            );
        }
    });
    $('#products').change(function(){
        var op = $(this).find("option:selected").text();
        var id = $(this).val();
        console.log(id);
        $('#products_id').replaceWith(
                '<input type="hidden" class="form-control" id="products_id" name="products_id" value="' +
                id + '">'
            );
        

    });
});

function myFunction() {
    var change = document.getElementsByTagName("option");

    for (var i = 0; i < change.length; i++) {
        change[i].removeAttribute("value");
    }
}

$(function() {

    $('#number').change(function() {
        if ($(this).val() == 'Add new number')
            $('#number').replaceWith(
                '<input type="tel" class="form-control" id="inputNumber" placeholder="Enter Number/+966" name="number" pattern="^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$">'
            )
    });
});

$(function() {
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

});
</script>