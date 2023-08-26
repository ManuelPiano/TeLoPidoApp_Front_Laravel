@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Agregar Cliente</h1>
        <form method="post" action="{{ route('clients.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container mt-5">
        <h2>Clientes Existentes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente['id'] }}</td>
                        <td>{{ $cliente['name'] }}</td>
                        <td>{{ $cliente['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
