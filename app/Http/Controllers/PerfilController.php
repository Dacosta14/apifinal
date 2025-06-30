<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PerfilController extends Controller
{
    // 🔍 Listar todos os perfis
    public function index()
    {
        $perfil = Perfil::all();
        return view('perfil.index', compact('perfil'));
    }

    // ➕ Mostrar o formulário de criação
    public function create()
    {
        return view('perfil.create');
    }

    // 💾 Salvar novo perfil no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:perfis,email',
            'data_nascimento' => 'nullable|date',
            'departamento' => 'nullable|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'grupos' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dados = $request->all();

        // Upload da foto (se houver)
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nomeFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/fotos', $nomeFoto);
            $dados['foto'] = $nomeFoto;
        }

        Perfil::create($dados);

        return redirect()->route('perfil.index')->with('success', 'Perfil criado com sucesso!');
    }

    // ✏️ Mostrar formulário de edição
    public function edit($id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfil.edit', compact('perfil'));
    }

    // 🔄 Atualizar perfil no banco
    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:perfis,email,' . $id,
            'data_nascimento' => 'nullable|date',
            'departamento' => 'nullable|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'grupos' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dados = $request->all();

        // Upload de nova foto (substituir a antiga se existir)
        if ($request->hasFile('foto')) {
            if ($perfil->foto && Storage::exists('public/fotos/' . $perfil->foto)) {
                Storage::delete('public/fotos/' . $perfil->foto);
            }

            $foto = $request->file('foto');
            $nomeFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/fotos', $nomeFoto);
            $dados['foto'] = $nomeFoto;
        }

        $perfil->update($dados);

        return redirect()->route('perfil.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    // 🗑️ Deletar perfil
    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);

        // Deletar a foto se existir
        if ($perfil->foto && Storage::exists('public/fotos/' . $perfil->foto)) {
            Storage::delete('public/fotos/' . $perfil->foto);
        }

        $perfil->delete();

        return redirect()->route('perfil.index')->with('success', 'Perfil deletado com sucesso!');
    }
}
