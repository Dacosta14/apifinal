<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Mostrar todos os animais
    public function index()
    {
        $animais = Animal::all();
        return view('animais.index', compact('animais'));
    }

    // Mostrar formulário de cadastro
    public function create()
    {
        return view('animais.create');
    }

    // Salvar novo animal
    public function store(Request $request)
    {
        $request->validate([
         'nome' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'idade' => 'required|integer',
        ]);

        Animal::create($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    // Mostrar um animal específico (opcional)
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.show', compact('animal'));
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.edit', compact('animal'));
    }

    // Atualizar animal
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'idade' => 'required|integer',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    // Deletar animal
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');
    }
}
