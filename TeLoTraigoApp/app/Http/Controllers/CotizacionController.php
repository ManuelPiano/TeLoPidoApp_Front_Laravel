<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Agrega esta línea

class CotizacionController extends Controller
{
    public function index()
    {
        return view('cotizacion');
    }

    public function calculate(Request $request)
    {
        $response = Http::post('http://localhost:8081/quotations/calculate', [
            'clientId' => $request->input('clientId'),
            'productId' => $request->input('productId')
        ]);

        $cotizacion = $response->json();

        return view('cotizacion', compact('cotizacion'));
    }
}
