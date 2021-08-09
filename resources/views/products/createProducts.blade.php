@extends('admin.adminpage')


@section('products')
<div class="container-fluid"  >
    <div class="row">
        <!-- left column -->
        <div class="col-md-6" >
            <div class="card card-primary">
                <div class="card-header" style="background-color:#E22C87;">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <style>
                .file-upload {
                    background-color: #ffffff;
                    width: auto;
                    margin: 0 auto;
                }

                .file-upload-btn {
                    width: auto;
                    margin: 0;
                    color: black;
                    border: none;
                    padding: 10px;
                    border-radius: 4px;
                    transition: all .2s ease;
                    outline: none;
                    text-transform: uppercase;
                   
                }

                .file-upload-btn:hover {
                    background: #E22C87;
                    color: #ffffff;
                    transition: all .2s ease;
                    cursor: pointer;
                }

                .file-upload-btn:active {
                    border: 0;
                    transition: all .2s ease;
                }

                .file-upload-content {
                    display: none;
                    text-align: center;
                }

                .file-upload-input {
                    position: absolute;
                    margin: 0;
                    padding: 0;
                    width: auto;
                    height: auto;
                    outline: none;
                    opacity: 0;
                    cursor: pointer;
                }

                .image-upload-wrap {
                    margin-top: 20px;
                    border: 4px dashed #E22C87;
                    position: relative;
                }

                .image-dropping,
                .image-upload-wrap:hover {
                    background-color: #E22C87;
                    border: 4px dashed #ffffff;
                }

                .image-title-wrap {
                    padding: 0 15px 15px 15px;
                    color: #222;
                }

                .drag-text {
                    text-align: center;
                }

                .drag-text h3 {
                    font-weight: 100;
                    text-transform: uppercase;
                    color: black;
                    padding: 60px 0;
                }

                .file-upload-image {
                    max-height: 200px;
                    max-width: 200px;
                    margin: auto;
                    padding: 20px;
                }

                .remove-image {
                    width: 200px;
                    margin: 0;
                    color: #fff;
                    background: #cd4535;
                    border: none;
                    padding: 10px;
                    border-radius: 4px;
                    border-bottom: 4px solid #b02818;
                    transition: all .2s ease;
                    outline: none;
                    text-transform: uppercase;
                    font-weight: 700;
                }

                .remove-image:hover {
                    background: #c13b2a;
                    color: #ffffff;
                    transition: all .2s ease;
                    cursor: pointer;
                }

                .remove-image:active {
                    border: 0;
                    transition: all .2s ease;
                }
                </style>

                <form method="post" action="/products/createProducts" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pname"> Product Name</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter Product Name"
                                name="pname">
                        </div>
                        <div class="file-upload">
                            <label for="img"> Product Image</label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' onchange="readURL(this);"
                                    accept="image/*" id ="img" name="img"/>
                                <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                            class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                            <br>
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                        </div>
                        <div class="form-group">
                            <label for="description"> Product Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Enter Product Description"
                                name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" id="categories" name="categories">
                                <option> Baby Donuts</option>
                                <option> Donuts </option>
                                <option> Specials </option>
                                <option> Drinks </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">SAR</span>
                                </div>
                                <input  class="form-control" value="0.00" data-decimal="2" min="0"
                                    step="0.1" type="number" id="price" name="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                        data-type="minus" data-field="quantity">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number" value="1" min="1"
                                    >
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus"
                                        data-field="quantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
console.log('Its working');

$(function() {
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        console.log(fieldName);
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