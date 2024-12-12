@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Tax Rate</h4><br><br>

                        <form method="post" action="{{ route('tax_rate.update', $taxRate->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="taxRateCode" class="col-sm-2 col-form-label">Tax Rate Code</label>
                                <div class="col-sm-10">
                                    <input name="taxRateCode" class="form-control" type="number" value="{{ $taxRate->taxRateCode }}" id="taxRateCode">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="descriptionTaxRate" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="descriptionTaxRate" class="form-control" type="text" value="{{ $taxRate->descriptionTaxRate }}" id="descriptionTaxRate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="taxRate" class="col-sm-2 col-form-label">Tax Rate (%)</label>
                                <div class="col-sm-10">
                                    <input name="taxRate" class="form-control" type="number" step="0.01" value="{{ $taxRate->taxRate }}" id="taxRate">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Tax Rate">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection