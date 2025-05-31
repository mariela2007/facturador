<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {

        $clientes = Cliente::get();

        return Inertia::render('Cliente/Index', [
            'clientes' => $clientes
        ]);
    }
}
