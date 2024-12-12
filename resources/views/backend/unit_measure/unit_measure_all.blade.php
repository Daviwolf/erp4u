@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Unit Measures</h4>
                        <a href="{{ route('unit_measures.add') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Add Unit Measure</a>
                        <br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unitMeasures as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>
                                        <a href="{{ route('unit_measures.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('unit_measures.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
