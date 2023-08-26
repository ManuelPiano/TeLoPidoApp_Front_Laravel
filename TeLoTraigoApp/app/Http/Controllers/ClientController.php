<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }

    public function index()
    {
        $response = Http::get('http://localhost:8081/clients/list');
        $clientes = $response->json();

        return view('clients.index', ['clientes' => $clientes]); // Pasa la variable $clientes a la vista
    }

    public function store(Request $request)
    {
        $response = Http::post('http://localhost:8081/clients/create', [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        $client = $response->json();

        return redirect()->route('clients.index')->with('success', 'Cliente agregado exitosamente.');
    }
}
