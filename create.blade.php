@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Criar Nova Ordem de Compra</h4>

                        <form method="post" action="{{ route('purchase_order.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="order_number" class="col-sm-2 col-form-label">Número da Ordem</label>
                                <div class="col-sm-10">
                                    <input name="order_number" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="supplier_id" class="col-sm-2 col-form-label">Fornecedor</label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="">Selecione um Fornecedor</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="order_date" class="col-sm-2 col-form-label">Data do Pedido</label>
                                <div class="col-sm-10">
                                    <input name="order_date" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="delivery_date" class="col-sm-2 col-form-label">Data de Entrega</label>
                                <div class="col-sm-10">
                                    <input name="delivery_date" class="form-control" type="date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_amount" class="col-sm-2 col-form-label">Valor Total</label>
                                <div class="col-sm-10">
                                    <input name="total_amount" class="form-control" type="number" step="0.01" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control" required>
                                        <option value="pending">Pendente</option>
                                        <option value="completed">Concluída</option>
                                        <option value="cancelled">Cancelada</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Salvar Ordem">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
