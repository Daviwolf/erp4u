@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('family.add') }}" class="btn btn-primary mb-3">Add Family</a>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Families</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Family</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($families as $key => $family)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $family->family }}</td>
                                    <td>
                                        <a href="{{ route('family.edit', $family->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('family.delete', $family->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
