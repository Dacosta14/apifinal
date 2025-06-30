<?php

namespace App\Http\Controllers\Api;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
{
    return view('perfil.create'); // cria essa view em resources/views/register.blade.php
}

        // Mostra a view login
    public function showLoginForm()
    {
        return view('login');
    }
  public function register(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:perfis,email',
        'password' => 'required|string|min:6',
        // outros campos que quiser validar
    ]);

    $perfil = Perfil::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'password' => Hash::make($request->password), // criptografando
        'data_nascimento' => $request->data_nascimento,
        // etc
    ]);

    // opcional: logar automaticamente
    Auth::login($perfil);

    return redirect('/dashboard')->with('success', 'Cadastro realizado e logado!');
}

    public function login(Request $request)
{
    $validador = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validador->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validador->errors()
        ], 400);
    }

    $user = Perfil::where('email', $request->email)->first();

    // Verifica diretamente (sem hash)
    if (!$user || $user->password !== $request->password) {
        return response()->json([
            'success' => false,
            'message' => 'Credenciais inválidas',
        ], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'success' => true,
        'message' => 'Login realizado com sucesso',
        'token' => $token,
        'user' => $user,
    ]);
}

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Você foi deslogado com sucesso!');
}
}
