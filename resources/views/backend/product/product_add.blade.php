@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Product</h4><br><br>
                            <form method="post" action="{{ route('product.store') }}" id="myForm"> @csrf
                                <div class="row mb-3">
                                    <label for="code" class="col-sm-2 col-form-label">Code</label>
                                    <div class="form-group col-sm-10">
                                        <input id="code" name="code" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="form-group col-sm-10">
                                        <input id="description" name="description" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="product_family" class="col-sm-2 col-form-label">Family</label>
                                    <div class="form-group col-sm-10">
                                        <select id="product_family" name="product_family" aria-label="Default select example" class="form-select select2">
                                            <option selected=""></option>
                                            @foreach($families as $prod)
                                                <option value="{{$prod->family}}">
                                                    {{$prod->family}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="product_unit" class="col-sm-2 col-form-label">Unit</label>
                                    <div class="form-group col-sm-10">
                                        <select id="product_unit" name="product_unit" aria-label="Default select example" class="form-select select2">
                                            <option selected=""></option>
                                            @foreach($unitMeasures as $prod)
                                                <option value="{{$prod->unit}}">
                                                    {{$prod->unit}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="product_taxRateCode" class="col-sm-2 col-form-label">Tax Rate</label>
                                    <div class="form-group col-sm-10">
                                        <select id="product_taxRateCode" name="taxRateCode_Product" aria-label="Default select example" class="form-select select2">
                                            <option selected=""></option>
                                            @foreach($taxRates as $prod)
                                                <option iTaxDescription="{{$prod->descriptionTaxRate}} - {{$prod->taxRate}}%" value="{{$prod->taxRateCode}}">
                                                    {{$prod->taxRateCode}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="example-text-input" id="lbTaxDescription" name="lbTaxDescription" class="col-sm-4 col-form-label"></label>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="image" class="col-sm-1 col-form-label">Img Product</label>
                                    <div class="col-sm-11">
                                        <input name="profile_image" class="form-control" type="file" id="image">
                                        <img id="showImage" class="rounded avatar-lg" src="{{url('upload/no_image.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#showImage').click(function () {
                $('#image').click();
            });
            $('#image').change(function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            $('#product_taxRateCode').change(function () {
                $('#lbTaxDescription').text('');
                $('#lbTaxDescription').text($('#product_taxRateCode option:selected').attr('iTaxDescription'));
            });

            $('#myForm').validate({
                rules: {
                    code: { required: true },
                    description: { required: true },
                    product_family: { required: true },
                    product_unit: { required: true },
                    taxRateCode_Product: { required: true },
                    profile_image: { required: true }
                },
                messages: {
                    code: { required: 'Please Enter Product Code.' },
                    description: { required: 'Please Enter Product Description.' },
                    product_family: { required: 'Please Select Product Family.' },
                    product_unit: { required: 'Please Select Product Unit.' },
                    taxRateCode_Product: { required: 'Please Select Tax Rate Code.' },
                    profile_image: { required: 'Please Upload Product Image.' }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
