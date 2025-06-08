<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{

    public function index() {

        $clientes = Cliente::get();


        return Inertia::render('Cliente/Index', [
            'clientes' => $clientes
        ]);
    }

    public function create() {

        return Inertia::render('Cliente/Create');
    }

    public function store(Request $request) {

        $request->validate([
            'nombres' => 'required|string|max:255',
            'pri_ape' => 'required|string|max:255',
            'seg_ape' => 'required|string|max:255',
            'genero' => 'nullable|string|max:9',
            'docu_tip' => 'nullable|string|max:9',
            'docu_num' => 'required|string|unique:clientes,docu_num',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
        ]);
        $cliente = Cliente::create($request->all());
        
        return redirect()->route('cliente.index')->with('success', 'Se ha creado un cliente.');
    }

    public function exportarPdf() {

        $clientes = Cliente::all();

        $pdf = Pdf::loadView('pdf.cliente', compact('clientes'));

        return $pdf->download('clientes.pdf');
    }

    public function edit($id)
{
    $cliente = Cliente::findOrFail($id);
    return inertia('Cliente/Edit', compact('cliente')); // Usando Inertia
}

public function update(Request $request, $id)
{
    $cliente = Cliente::findOrFail($id);
    $cliente->update($request->all());

    return redirect()->route('cliente.index')->with('success', 'Cliente actualizado');
}

public function destroy($id)
{
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();

    return redirect()->route('cliente.index')->with('success', 'Cliente eliminado');
}
    


}
