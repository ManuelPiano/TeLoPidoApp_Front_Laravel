@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Realizar Cotización</h1>

        <form method="post" action="{{ route('cotizacion.calculate') }}">
            @csrf
            <div class="mb-3">
                <label for="clientId" class="form-label">ID de Cliente:</label>
                <input type="number" name="clientId" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="productId" class="form-label">ID de Producto:</label>
                <input type="number" name="productId" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular Cotización</button>
        </form>

        @isset($cotizacion)
        <h2 class="mt-5">Resultado de la Cotización:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Precio del Producto (USD)</th>
                    <th>Costo de Envío (USD)</th>
                    <th>Costo de Importación (USD)</th>
                    <th>Costo de Seguro (USD)</th>
                    <th>Impuestos (USD)</th>
                    <th>Costo Total de Importación (USD)</th>
                    <th>Costo Total Producto + Importación (USD)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cotizacion['id'] }}</td>
                    <td>{{ $cotizacion['client']['name'] }}</td>
                    <td>{{ $cotizacion['product']['name'] }}</td>
                    <td>${{ number_format($cotizacion['product']['price'], 2) }}</td>
                    <td>${{ number_format($cotizacion['shippingCost'], 2) }}</td>
                    <td>${{ number_format($cotizacion['importFeesCost'], 2) }}</td>
                    <td>${{ number_format($cotizacion['insuranceCost'], 2) }}</td>
                    <td>${{ number_format($cotizacion['taxesCost'], 2) }}</td>
                    <td>${{ number_format($cotizacion['totalImportCost'], 2) }}</td>
                    <td>${{ number_format($cotizacion['totalProductAndImportCost'], 2) }}</td>
                </tr>
            </tbody>
        </table>
        @endisset
    </div>
@endsection
