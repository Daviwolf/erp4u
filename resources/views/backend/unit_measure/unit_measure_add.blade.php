@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Unit Measure</h4>
                        <form method="post" action="{{ route('unit_measures.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit Name</label>
                                <input type="text" name="unit" class="form-control" id="unit" placeholder="Enter unit name">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Unit Measure</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
