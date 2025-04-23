<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->filled('busca')) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        }

        if ($request->filled('fornecedor_id')) {
            $query->whereHas('fornecedores', function ($q) use ($request) {
                $q->where('fornecedores.id', $request->fornecedor_id);
            });
        }

        $produtos = $query->get();
        $fornecedores = Fornecedor::all();

        return view('produtos.index', compact('produtos', 'fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.create', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);
    
        Produto::create($request->all());
    
        return redirect()->route('produtos.index');
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
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $produto->load('fornecedores');
        return view('produtos.edit', compact('produto', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'fornecedores' => 'array'
        ]);

        $produto->update($request->only('nome'));
        $produto->fornecedores()->sync($request->fornecedores);

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }

    public function destroyMultiple(Request $request)
    {
        Produto::whereIn('id', $request->ids)->delete();
        return redirect()->route('produtos.index');
    }
}
