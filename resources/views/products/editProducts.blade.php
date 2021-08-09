@extends('admin.adminpage')


@section('products')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
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
                <form method="post" action="{{url('/products/editProducts/' . $products->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pname"> Product Name</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter Product Name"
                                name="pname" value="{{ $products-> p_name}}">
                        </div>
                        <div class="file-upload">
                            <label for="img"> Product Image</label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"
                                    id="img" name="img"/>
                                <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="{{asset('../images/' . $products->img)}}" alt="your image" />
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
                            <textarea type="text" class="form-control" id="description"
                                placeholder="Enter Product Description" name="description" rows="3"  required >{{ $products->p_descript}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" id="categories" name="categories" >
                                
                                <option value="Baby Donuts" @if($products->categories==='Baby Donuts') selected='selected' @endif> Baby Donuts</option>
                                <option value="Donuts" @if($products->categories==='Donuts') selected='selected' @endif> Donuts </option>
                                <option value="Specials" @if($products->categories==='Specials') selected='selected' @endif> Specials </option>
                                <option value="Drinks" @if($products->categories==='Drinks') selected='selected' @endif> Drinks </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">SAR</span>
                                </div>
                                <input class="form-control"  data-decimal="2" min="0" step="0.1"
                                    type="number" id="price" name="price" value ="{{ $products-> price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <div class="input-group">
                                <input class="form-control" data-decimal="1" min="0" step="1.0"
                                    type="number" id="quantity" name="quantity" value="{{ $products-> quantity}}">
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
$('.image-upload-wrap').bind('dragover', function() {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function() {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>


@endsection