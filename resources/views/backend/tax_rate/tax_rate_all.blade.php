@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Tax Rates</h4>
                        <a href="{{ route('tax_rate.add') }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right;">Add Tax Rate</a>
                        <br><br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tax Rate Code</th>
                                    <th>Description</th>
                                    <th>Tax Rate (%)</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taxRates as $key => $taxRate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $taxRate->taxRateCode }}</td>
                                    <td>{{ $taxRate->descriptionTaxRate }}</td>
                                    <td>{{ $taxRate->taxRate }}</td>
                                    <td>{{ $taxRate->created_by }}</td>
                                    <td>
                                        <a href="{{ route('tax_rate.edit', $taxRate->id) }}" class="btn btn-info sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tax_rate.delete', $taxRate->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
