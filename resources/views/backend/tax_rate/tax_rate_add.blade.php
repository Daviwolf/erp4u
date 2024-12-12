@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Tax Rate</h4><br><br>

                        <form method="post" action="{{ route('tax_rate.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="taxRateCode" class="col-sm-2 col-form-label">Tax Rate Code</label>
                                <div class="col-sm-10">
                                    <input name="taxRateCode" class="form-control" type="number" id="taxRateCode" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="descriptionTaxRate" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="descriptionTaxRate" class="form-control" type="text" id="descriptionTaxRate" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="taxRate" class="col-sm-2 col-form-label">Tax Rate (%)</label>
                                <div class="col-sm-10">
                                    <input name="taxRate" class="form-control" type="number" step="0.01" id="taxRate" required>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Tax Rate">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
