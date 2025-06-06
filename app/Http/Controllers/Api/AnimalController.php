<?php

namespace App\Http\Controllers\Api;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalController extends Controller
{
    public function index()
    {
        return Animal::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:15',
            'raca' => 'required|string|max:20',
            'nome' => 'required|string|max:20',
            'idade' => 'required|integer',
        ]);

        return Animal::create($validated);
    }

    public function show($id)
    {
        return Animal::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        return $animal;
    }

    public function destroy($id)
    {
        Animal::destroy($id);
        return response()->json(['mensagem' => 'Animal removido com sucesso']);
    }
}