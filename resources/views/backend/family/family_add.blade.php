@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Family</h4>
                        <form method="post" action="{{ route('family.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="family" class="form-label">Family Name</label>
                                <input type="text" name="family" class="form-control" id="family" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
