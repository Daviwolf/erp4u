@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4><br><br>
                        <form method="post" action="{{ route('product.update') }}" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                Code</label>
                                <div class="form-group col-sm-10">
                                    <input name="code" class="form-control" value="{{
                                    $product->code }}" type="text" >
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                Family</label>
                                <div class="form-group col-sm-10">
                                    <select id="product_family" name="product_family" aria-label="Default select example" class="form-selct select2">
                                        <option selected=""></option>
                                        @foreach($families as$prod)
                                            <option iOption="" value=" {{$prod-> family}}">
                                                {{$prod-> family==$product->family?'selected':''}}>{{$prod->family}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                    Unit</label>
                                <div class="form-group col-sm-10">
                                    <select id="product_unit" name="product_unit" aria-label="Default select example" class="form-selct select2">
                                        <option selected=""></option>
                                        @foreach($unitMeasures as$prod)
                                            <option iOption="" value=" {{$prod-> unit}}">
                                                {{$prod-> unit==$product->unit?'selected':''}}>{{$prod->unit}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                    <!-- Tax Rate -->
                    <label for="example-text-input"
                           class="col-sm-1 col-form-label">Tax Rate</label>
                    <div class="form-group col-sm-1">
                        <select id="product_taxRateCode"
                                name="taxRateCode_ Product" class="form-select select2"
                                aria-label="Default select example">
                            <option selected=""></option>
                            @foreach($taxRates as $prod)
                           <option iTaxDescription="{{$prod->desciptionTaxRate}}-{{$prod->taxRate}}%" value="{{$prod->taxrateCode}}"{{$prod->taxRateCode==$product->taxrateCode ?'select':''}}>
                               {{$prod->taxrateCode}}
                           </option>
                            @endforeach
                        </select>

                        <label for="example-text-input" id="lbdescription" name="lbdescription" class="col-sm-4 col-form-label"></label>
                    </div>
                            <div class="form-group row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-1 col-form-label">Img Product </label>
                                <div class="col-sm-11 d-none">
                                    <input name="profile_image"
                                           class="form-control" type="file" id="image">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <!-- Product Image Foto-->
                                <label for="example-text-input" class="col-sm-1 col-form-label"></label>
                                <div class="form-group col-sm-11">
                                    <img id="showImage" class="rounded avatar-1lg"
                                         src="{{asset($product->image)}}" alt="Card image cap">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <input type="submit" class="col-sm-1 btn btn-info waves-effect waves-light”"
                                       value="Update Product">

                    </div>
                        </form>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#showImage').click(function () {
            $('#image').click();
        });
        $('#image').change(function () {
            var reader =new FileReader();
            reader.onload=function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        $("product_taxRateCode").change(function () {
            $('#lbTaxDescription').text('');
            $('#lbTaxDescription').text($('#product_taxRateCode option:selected').attr('iTaxDescription'))
        });
        $('#product_taxRateCode').trigger('change');
        $('#myForm').validate({
            rules: {
                code: {
                    required : true,
                },
                description: {
                    required : true,
                },
                product_family: {
                    required : true,
                },
                product_unit: {
                    required : true,
                },
                taxRateCode_Product: {
                    required : true,
                },
            },
            messages :{
                code: {
                    required : 'Please Enter Supplier Code.',
                },
                description: {
                    required : 'Please Enter product description.',
                },
                product_family: {
                    required : 'Please Enter Family.',
                },
                product_unit: {
                    required : 'Please Enter Product unit.',
                },
                taxRateCode_Product: {
                    required : 'Please Enter Tax Rate Code.',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection
