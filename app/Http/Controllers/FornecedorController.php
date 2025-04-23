<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fornecedor::query();

        if ($request->filled('busca')) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        }

        $fornecedores = $query->get();

        return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:fornecedores,cnpj',
        ]);
        Fornecedor::create($request->all());
        return redirect()->route('fornecedores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:fornecedores,cnpj',
        ]);
        $fornecedor->update($request->all());
        return redirect()->route('fornecedores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        // Verifica se o fornecedor tem produtos associados
        if ($fornecedor->produtos()->count() > 0) {
            return redirect()->route('fornecedores.index')->with('error', 'Fornecedor não pode ser excluído, pois possui produtos associados.');
        }
        
        // Exclui o fornecedor
        $fornecedor->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído com sucesso.');

    }

    public function destroyMultiple(Request $request)
    {
        // Valida se os IDs foram enviados
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:fornecedores,id',
        ]);
        
        // Verifica se algum dos fornecedores tem produtos associados
        foreach ($request->ids as $id) {
            $fornecedor = Fornecedor::find($id);
            if ($fornecedor && $fornecedor->produtos()->count() > 0) {
                return redirect()->route('fornecedores.index')->with('error', 'Um ou mais fornecedores não podem ser excluídos, pois possuem produtos associados.');
            }
        }
        // Exclui os fornecedores
        Fornecedor::whereIn('id', $request->ids)->delete();
        return redirect()->route('fornecedores.index');
    }
}
