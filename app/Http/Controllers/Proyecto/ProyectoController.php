<?php

namespace App\Http\Controllers\Proyecto;
use App\Models\Proyecto;
use App\Models\Cliente; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with('cliente')->get();
        return Inertia::render('Proyecto/Index', [
            'proyectos' => $proyectos
        ]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        return Inertia::render('Proyecto/Create', [
            'clientes' => $clientes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cliente_id' => 'nullable|exists:clientes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente');
    }

    public function edit(Proyecto $proyecto)
    {
        $clientes = Cliente::all();
        return Inertia::render('Proyecto/Edit', [
            'proyecto' => $proyecto,
            'clientes' => $clientes
        ]);
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cliente_id' => 'nullable|exists:clientes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $proyecto->update($validated);
    
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente');
    }
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado');
    }

    public function exportarPdf()
    {
        $proyectos = Proyecto::with('cliente')->get();
        $pdf = Pdf::loadView('proyectos.pdf', compact('proyectos'));
        return $pdf->download('lista_proyectos.pdf');
    }
}


