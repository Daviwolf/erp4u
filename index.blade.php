@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de Ordens de Compra</h4>
                        <a href="{{ route('purchase_order.create') }}" class="btn btn-success mb-3">Adicionar Nova Ordem</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Número da Ordem</th>
                                    <th>Fornecedor</th>
                                    <th>Data do Pedido</th>
                                    <th>Data de Entrega</th>
                                    <th>Valor Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->supplier->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->delivery_date ?? 'N/A' }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->status }}</td>
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
