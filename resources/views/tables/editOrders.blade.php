@extends('admin.adminpage')


@section('table')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header" style="background-color:#E22C87;">
                    <h3 class="card-title">Edit an Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="post" action="{{url('/tables/editOrders/' . $orders->id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name"
                                value="{{$orders->customer_name}}">
                        </div>
                        <div class="form-group">
                            <label for="number">Customer Number</label>
                            <input type="tel" class="form-control" id="number" placeholder="Enter Number/+966"
                                name="number" value="{{$orders->customer_number}}"
                                pattern="^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$">
                        </div>
                        <div class="form-group">
                            <label for="pickup">Pickup Location</label>
                            <input type="text" class="form-control" id="pickup" placeholder="Enter Pickup Location"
                                name="pickup" value="{{$orders->pickup_location}}">
                        </div>
                        <div class="form-group">
                            <label for="dropoff">Dropoff Location</label>
                            <input type="text" class="form-control" id="dropoff" placeholder="Enter Dropoff Location"
                                name="dropoff" value="{{$orders->dropoff_location}}">
                        </div>
                        <div class="form-group">
                            <label for="descript">Order Description</label>
                            <input type="text" class="form-control" id="descript" placeholder="Enter Order Description"
                                name="descript" value="{{$orders->order_descript}}">
                        </div>
                        <div class="form-group">
                            <label for="amount">Order Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Enter Order amount"
                                name="amount" value="{{$orders->order_amount}}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" style="background-color:#E22C87;" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
$(function() {
    $('#products').change(function() {
        var op = $(this).find("option:selected").text();
        var id = $(this).val();
        console.log(id);
        $('#products_id').replaceWith(
            '<input type="hidden" class="form-control" id="products_id" name="products_id" value="' +
            id + '">'
        );


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